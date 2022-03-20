<?php 

require_once('Model/Product.php');

$product = new Product();

if (isset($_POST['searchBar']))
{
    $search = htmlspecialchars($_POST['searchBar']);
    $product->getAllInfo($search);
}
