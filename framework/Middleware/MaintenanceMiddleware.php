<?php
 
namespace RLC\Framework\Middleware;

class MaintenanceMiddleware{
    public function handle() {
        if($_ENV['MAINTENANCE_MODE'] == 'true'){
            echo "Not avaliable now";
            exit();
        }
    }
}