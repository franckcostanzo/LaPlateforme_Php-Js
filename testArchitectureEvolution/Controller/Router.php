<?php

    require_once 'Model/View.php';
    $uri = str_replace("/testArchitectureEvolution/","", $_SERVER["REQUEST_URI"]);
    if( $uri != "")
    {
        $view = New View($uri);
        $view->display();
    }
    else
    {
        $view = New View("home");
        $view->display(); 
    }