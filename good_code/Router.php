<?php

namespace app;

class Router{

    public array $getRoutes=[];
    public array $postRoutes=[];

    public function get($url,$fn){
        $this->getRoutes[$url]=$fn;
    }
    public function post($url,$fn){
        $this->postRoutes[$url]=$fn;
    }


    public function resolve(){
        $currentUrl=$_SERVER['PATH_INFO'] ?? '/'  ;
        $method=$_SERVER["REQUEST_METHOD"];

        if($method==="GET"){
            $fn=$this->getRoutes[$currentUrl] ?? null;
        }else{
            $fn=$this->postRoutes[$currentUrl] ?? null;
        }


        if($fn){
            call_user_func($fn);
        }else{
            echo "<h1 style='display: flex;justify-content:center; align-items:center;width:100%;height:100vh;'>
            Page not Found</h1>";
        }

    }
}

?>