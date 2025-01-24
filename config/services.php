<?php

use Doctrine\DBAL\Connection;
use League\Container\Container;
use League\Container\ReflectionContainer;
use RLC\Framework\dbal\DatabaseFactory;
use RLC\Framework\Http\Kernel;
use RLC\Framework\Router\Router;
use RLC\Framework\Router\RouterInterface;


$container = new Container();

$container->delegate(new ReflectionContainer(true));

// $container->add("DB", DatabaseFactory::class);

// $container->add(Connection::class, function()use ($container){
//     return $container->get("DB")->getConnection();
// });

$container->add(RouterInterface::class, Router::class);

$container->add(Kernel::class)->addArgument(RouterInterface::class)->addArgument($container);


return $container;