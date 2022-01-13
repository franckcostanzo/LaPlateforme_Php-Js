<?php 
    $i = 0;
    $arr = array (26, 37, 88, 1111, 3233);
    while ( $i <= 1337){  
        if (in_array($i, $arr)){
            $i++;
            continue; 
        } 
        else
        {
            echo $i . "<br>";
            $i++;
        };
        
    } ;
?>