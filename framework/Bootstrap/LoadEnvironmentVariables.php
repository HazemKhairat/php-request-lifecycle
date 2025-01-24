<?php

namespace RLC\Framework\Bootstrap;

use Dotenv\Dotenv;

class LoadEnvironmentVariables
{
    public function bootstrap($container = null)
    {
        // dd(dirname(__DIR__));
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();
    }
}

