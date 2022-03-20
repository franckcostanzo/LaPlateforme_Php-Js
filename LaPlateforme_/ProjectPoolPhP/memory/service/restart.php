<?php
session_start();
$tempConn;
$tempUsername;
$tempEmail;
$tempScore;
$tempSuccess;
$tempCount;
if (isset($_SESSION['username']))
{
    $tempConn = $_SESSION["connected"];
    $tempUsername = $_SESSION['username'];
    $tempEmail = $_SESSION['email'];
    $tempScore = $_SESSION['score'];
    $tempSuccess = $_SESSION['success'];
    $tempCount = $_SESSION['count'];
}

session_destroy();
if ($tempConn != null)
{
    $_SESSION["connected"] = $tempConn ;
    $_SESSION['username'] = $tempUsername;
    $_SESSION['email'] = $tempEmail;
    $_SESSION['score'] = $tempScore;
    $_SESSION['success'] = $tempSuccess;
    $_SESSION['count'] = $tempCount;
}
header('Location: ../index.php');
exit;
?>