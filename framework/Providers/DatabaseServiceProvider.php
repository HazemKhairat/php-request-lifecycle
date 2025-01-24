<?php

namespace RLC\Framework\Providers;
use Doctrine\DBAL\Connection;
use RLC\Framework\dbal\DatabaseFactory;

class DatabaseServiceProvider extends ServiceProvider{
    public function register(){
        $this->container->add("DB", DatabaseFactory::class);
    }

    public function boot(){
        $this->container->add(Connection::class, function(){
            return $this->container->get("DB")->getConnection();
        });
    }
}