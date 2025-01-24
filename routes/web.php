<?php

use App\Controllers\HomeController;




return [
    ['GET', '/RLC/public/', [HomeController::class, "index"]],
    ['GET', '/RLC/public/view', [HomeController::class, "viewPage"]],
    ['POST', '/RLC/public/addUser', [HomeController::class, "addUser"]],
];