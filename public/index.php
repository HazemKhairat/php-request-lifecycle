<?php
use RLC\Framework\Http\Kernel;
use RLC\Framework\Http\Request;
define("ROOT", dirname(__DIR__));
require_once dirname(__DIR__) . "/vendor/autoload.php";
// ===========================================================

$container = require ROOT . '/config/services.php';

// $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
// $dotenv->load();

// dd($_ENV);

$request = Request::getGlobals();
$kernel = $container->get(Kernel::class);
$response = $kernel->handle($request);

