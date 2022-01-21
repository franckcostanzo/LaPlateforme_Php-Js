<?php

    // connect to the database
$db = mysqli_connect('localhost', 'root', '', 'livreor');


$query = "SELECT * FROM utilisateurs WHERE username='pedro'";
    $resultId = mysqli_query($db, $query);
    // $userId = mysqli_real_escape_string($db, $resultId["id"]);
    while ($row = mysqli_fetch_assoc($resultId))
    {
        echo $row['id'];
    }

?>