<?php


class HomeController{

    public function index($requestdata = []){
        View::render('Home');
    }
    
}

?>