<?php
//             str_replace(  
define('ROOT', str_replace('index.php',     //valeur à chercher,
                            '',             //par quoi on la remplace,
                            $_SERVER['SCRIPT_FILENAME'])); 
                            // dans quel endroit(chaine de caractere, tableau ...))

?>