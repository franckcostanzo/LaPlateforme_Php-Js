<?php
$str="Les choses que l'on possede finissent par nous posseder";
$x=0;
while (isset($str[$x]))
{
    $x++;
};
$revStr="";
for ($x-1;$x>=1;$x--)
{
    $revStr .= $str[$x-1];
};
echo "<h1>$revStr</h1>";
?>