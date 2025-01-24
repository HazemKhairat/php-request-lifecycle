<?php 

namespace App\Controllers;

use App\Controllers\PostController;
use League\Container\Container;
use RLC\Framework\Http\Request;

class HomeController{

    public function __construct(PostController $postController){
        // echo "success <br>";
    }
    public function index(){
        echo "helllo from home class";
    }

    public function viewPage(){
        $content = include ROOT."/src/view/home.php";
        return $content;
    }

    public function addUser(Request $request){
        // dd($request->post);
    }

}