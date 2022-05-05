<?php

    require_once 'Model/View.php';
    if( isset($_GET['url']) )
    {
        //faire un try catch pour les url qui n'existe pas et faire une page 404
        $view = New View($_GET['url']);
        $view->display();
    }
    else
    {
        $view = New View("home");
        $view->display(); 
    }