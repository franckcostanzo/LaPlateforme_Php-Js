<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
function bubblesort(array $myArr, bool $croissant)
{
    if ($croissant)
    {
        asort($myArr);
        foreach($myArr as $elem)
        {
            echo $elem." ";
        }
        
    }
    else
    {
        arsort($myArr);
        foreach($myArr as $elem)
        {
            echo $elem." ";
        }   
    }
}

$testArr= array("abc", "ghi", "def");
bubblesort($testArr, true);
echo "<br>";
bubblesort($testArr, false);

?>
    
</body>
</html>