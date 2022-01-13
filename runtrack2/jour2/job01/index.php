<?php 
    $i = 0;
    do {
        if ($i == 42) {
            echo "<b><u>" . $i . "</b></u><br>"; 
        } 
        else
        {
            echo $i . "<br>";
        };
        $i++;
    } while ( $i <= 1337);
?>