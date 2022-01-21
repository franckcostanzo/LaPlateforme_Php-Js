<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jour08";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sqlQuery = "SELECT SUM(superficie) as superficie_totale FROM etage;";
$result = $conn->query($sqlQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
         table, th, td {
            border: 1px solid black;
         }
</style>
<body>
  <table>
    <tr>
    <?php
        
        foreach ($result as  $student)
          {
            foreach($student as $k => $v)
            {
                echo "<th>$k</th>";                
            }
            break;
          }
    ?>
    </tr>
    <tr>
        <?php
        foreach ($result as $student)
        { 
            foreach($student as $elem)
            {
            echo "<td>$elem</td>";
            }
        ?>
    </tr>
    <?php    
    }
    $conn->close();
    ?>
  </table>
    
</body>
</html>