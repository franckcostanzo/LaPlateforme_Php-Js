<style>
         table, th, td {
            border: 1px solid black;
         }
</style>
<?php
$str="On n est pas le meilleur quand on le croit mais quand on le sait";
$dic= array( "consonnes" => array ( "b", "c", "d","f", "g", "h", "j", 
                                    "k", "l", "m", "n","p", "q", "r",
                                    "s", "t", "v", "w", "x", "y", "z"),
             "voyelles" => array ("a","e","i","o","u")  );
$totalVow=0;
$totalCon=0;
$x=0;
while (isset($str[$x]))
{
    $y=0;
    while (isset($dic["consonnes"][$y]))
    {
        if (($str[$x]) == ($dic["consonnes"][$y]))
        {
            $totalCon++;
        }
        $y++;
    }
    $z=0;
    while (isset($dic["voyelles"][$z]))
    {
        if (($str[$x]) == ($dic["voyelles"][$z]))
        {
            $totalVow++;
        }
        $z++;
    }
    $x++;   
}
    echo "<table><tr><th>Voyelles</th><th>Consonnes</th></tr>";
    echo "<tr><td>$totalVow</td><td>$totalCon</td></tr></table>"

?>