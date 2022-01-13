<?php
$n=1000;
//On prend chaque nombre entre 2 et n (0 et 1 n'étant pas premier)
for($i=2;$i<=$n;$i++){
    $nbDiv = 0;//Et on compte le nombre de diviseur    
    for($j=1;$j<=$i;$j++){
        if($i%$j==0){
            $nbDiv++;            
        }
    }
    if($nbDiv == 2){
//Un nombre premier est un chiffre qui ne possède que 2 diviseur (1 et
// lui-même)
            echo "$i<br>";
        }
} 

?>
