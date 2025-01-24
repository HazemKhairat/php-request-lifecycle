<?php

namespace RLC\Framework\Http;

class Request{
    // initialze attriputes (arrays)
    public $get;
    public $post;
    public $server;
    public $files;

    public function __construct(array $get, array $post, array $server, array $files){
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
        $this->files = $files;
    }

    public static function getGlobals(){
        // self refers to constructor
        return new self($_GET, $_POST, $_SERVER, $_FILES);
    }


}

