<?php
function calcule(float $a, $operation, float $b)
{
    switch($operation)
    {
        case "+":
            return $a + $b;
        case "-":
            return $a - $b;
        case "*":
            return $a * $b;
        case "/":
            return $a / $b;
        case "%":
            return $a % $b;
        default:
            return "Je ne peux pas calculer ça !";
    }
}

echo calcule(6,"/",2);
echo "<br>";
echo calcule(6,"a",7)


?>