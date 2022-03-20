<?php

    require_once 'Model/View.php';
    if( isset($_GET['url']) )
    {
        $view = New View($_GET['url']);
        $view->display();
    }
    else
    {
        $view = New View("home");
        $view->display(); 
    }