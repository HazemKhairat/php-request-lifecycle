<?php

namespace RLC\Framework\Router;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use League\Container\Container;
use RLC\Framework\Http\Request;
use function FastRoute\simpleDispatcher;
use RLC\Framework\Router\RouterInterface;


class Router implements RouterInterface
{
    public function dispatch(Request $request, Container $container)
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) {
            $routes = include ROOT . '/routes/web.php';

            foreach ($routes as $route) {
                $routeCollector->addRoute(...$route);
            }
            // dd($routeCollector);

        });

        $matching = $dispatcher->dispatch($request->server["REQUEST_METHOD"], $request->server["REQUEST_URI"]);
        // dd($matching);
        if($request->server['REQUEST_METHOD'] == 'POST'){
            array_unshift($matching[2], $request);
        }
        // dd($matching);
        // [$status, [$controller, $method], $vars] = $matching;
        switch ($matching[0]) {
            case Dispatcher::FOUND:
                return $this->returnRoutes($matching[1], $matching[2], $container);
            case Dispatcher::NOT_FOUND:
                throw new \Exception("route is not found");
            case Dispatcher::METHOD_NOT_ALLOWED:
                throw new \Exception("method not allowed");
        }
    }

    private function returnRoutes($handller, $arguments, $container)
    {
        $controllerObj = $container->get($handller[0]);
        return call_user_func_array([$controllerObj, $handller[1]], $arguments);
    }
}