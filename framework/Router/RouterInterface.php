<?php 
namespace RLC\Framework\Router;
use League\Container\Container;
use RLC\Framework\Http\Request;


Interface RouterInterface{
    public function dispatch(Request $request, Container $container);
}