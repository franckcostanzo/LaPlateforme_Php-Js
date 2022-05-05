<?php session_start(); require_once('./Controller/searchController.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Css/style.css">
    <link rel="stylesheet" type="text/css" href="./Css/bootstrap.min.css">
    <script src="./Js/script.js"></script>
    <title>Index</title>
</head>
<body class="d-flex flex-column justify-content-center align-items-center w-100">

<p class="text-center display-1">
    <span class="text-primary fw-bold">F</span>
    <span class="text-danger fw-bold">R</span>
    <span class="text-warning">O</span>
    <span class="text-primary fw-bold">O</span>
    <span class="text-success fw-bold">K</span>
    <span class="text-danger">L</span>
    <span class="text-warning fw-bold">E</span>
</p>

<form method="POST" class="w-50 d-flex justify-content-center">    
    <input type="text" name="searchText" id="search" class="w-50 rounded-pill text-center">
    <input type="submit" name="search" value="search" class="btn btn-light rounded-pill border">
</form>
    
</body>
</html>