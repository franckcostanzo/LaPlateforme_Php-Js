<style>
         table, th, td {
            border: 1px solid black;
         }
</style>
<?php
    $arr = array(200,204,173,98,171,404,459);

    echo "<table><tr>";    
    for ($i=0;$i<count($arr);$i++)
    {
        echo "<th>$arr[$i]</th>";
    }
    echo "</tr>";
    echo "<tr>";
    for ($i=0;$i<count($arr);$i++)
    {
        echo ((($arr[$i] % 2) == 0) ? "<td>$arr[$i] est pair</td>" : "<td>$arr[$i] est impair</td>");
    }
    echo "</tr></table>";
?>

