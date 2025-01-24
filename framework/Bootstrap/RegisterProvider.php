<?php

namespace RLC\Framework\Bootstrap;

use RLC\Framework\Providers\DatabaseServiceProvider;

class RegisterProvider{
    protected array $providers = [
        DatabaseServiceProvider::class,
    ];

    public function bootstrap($container){
        foreach($this->providers as $provider){
            (new $provider($container))->register();
        }
    }

}