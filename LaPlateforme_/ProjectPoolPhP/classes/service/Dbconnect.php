<?php 

 class Dbconnect {

    //connect to the database
   public static function dbconnect(){

        
    //version pour plesk
    //return mysqli_connect('localhost', 'franck-costanzo', 'Tisyoz84!!', 'franck-costanzo_classes'); 

    //version locale
   return mysqli_connect('localhost', 'root', '', 'classes');
   }
    
 }

?>