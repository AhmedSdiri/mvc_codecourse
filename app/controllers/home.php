<?php

//require_once '../app/core/Controller.php';
class Home {
    
    function __construct()
    {
        echo '</br> i am the home class';
    }
    function index($name='alex')
    {
        echo '</br> i am the the  homeindex method'.$name;
    }
    function test()
    {
        echo '</br> i am the the home test method';
    }
}