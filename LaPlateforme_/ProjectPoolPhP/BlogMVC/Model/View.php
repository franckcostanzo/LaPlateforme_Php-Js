<?php 

class View 
{
    private $file;
    private $title;
    private $content;

    public function __construct($action) 
    {

        $this->file = "View/".$action . ".php";
        $this->title = $action;
        $this->content = $this->createFile();

    }

    private function createFile() 
    {
        
        if (file_exists($this->file)) 
        {        
            ob_start();

            session_start(); 
            include('Controller/UserController.php'); 
            include('Controller/MessageController.php');
            include('View/Error.php');

            require $this->file;
            
            return ob_get_clean();
        }
        else 
        {
            throw new Exception("Fichier introuvable");
        }

    }

    public function display() 
    {
       $title = $this->title; 
       $content = $this->content; 
       require ('View/layout.php');
    }

}
