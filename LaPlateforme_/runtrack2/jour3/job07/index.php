<?php

$str="Certaines choses changent, et d'autres ne changeront jamais.";
$char="";
$x=0;
while (isset($str[$x]))
{
    $x++;
};
for ($i=0;$i<$x;$i++)
{
    if ($i==0)
    {
        $char = $str[0];
    }
    if(isset($str[$i+1]))
    {
        $str[$i] = $str[$i+1];
    }
    else
    {
        $str[$i] = $char;
    }
  
}
echo $str;

?>