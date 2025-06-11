<?php


class HomeController{

    public function index($requestdata = []){
        View::render('Home');
    }

    public function register($requestdata = []){
        View::render('register-choice');
    }
    
    public function details($requestdata = []){
        View::render('details-choice');
    }

    public function schedule($requestdata = []){
        View::render('schedule-choice');
    }
}

?>