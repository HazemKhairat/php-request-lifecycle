<?php

namespace RLC\Framework\Http;

use League\Container\Container;
use RLC\Framework\Middleware\MaintenanceMiddleware;
use RLC\Framework\Router\RouterInterface;
use RLC\Framework\Bootstrap\BootProviders;
use RLC\Framework\Bootstrap\RegisterProvider;
use RLC\Framework\Bootstrap\LoadEnvironmentVariables;

class Kernel
{
    protected array $middelwares = [
        MaintenanceMiddleware::class,
    ];
    protected array $bootstrappers = [
        LoadEnvironmentVariables::class,
        RegisterProvider::class,
        BootProviders::class,
    ];
    private RouterInterface $router;
    private Container $container;
    public function __construct(RouterInterface $router, Container $container){
        $this->router = $router;
        $this->container = $container;
    }
    public function handle(Request $request)
    {
        
       $this->bootstrapApp();
       $this->applyMiddleware();
    //    dd($this->container);
       return $this->router->dispatch($request, $this->container);
    }

    public function bootstrapApp(){
        foreach($this->bootstrappers as $bootstrapper){
            (new $bootstrapper)->bootstrap($this->container);
        }
    }

    public function applyMiddleware(){
        foreach($this->middelwares as $middleware){
            (new $middleware())->handle();
        }
    }
}

