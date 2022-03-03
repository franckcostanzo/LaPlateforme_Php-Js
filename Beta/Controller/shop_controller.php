<?php 
include_once ('Model/Produit.php');
$produit = new Produits();
$items;

/*-----------------------------
            CREATE
-----------------------------*/  
if(isset($_POST['create_prod']))
{
    $targetPath = 'View/ProductImg/';
    $filename = substr($_POST['nom_produit'],0,10);
    $targetFile = $targetPath.$filename.'.jpg';
    move_uploaded_file($_FILES['img']['tmp_name'], $targetFile);
    $nom = $_POST['nom_produit'];
    $prix = $_POST['unit_price'];
    $uniteEnStock = $_POST['units_in_stock'];
    $description = $_POST['description'];
    $idCategorie = $_POST['id_categorie'];
    $idSousCategorie = $_POST['id_sous_categorie'];
    $produit->createProduit($nom, $targetFile, $prix, $uniteEnStock, $description, $idCategorie, $idSousCategorie);
}

/*-----------------------------
               UPDATE
-----------------------------*/   
if(isset($_POST['update_prod']))
{
    $nom = $_POST["nom_produit"];
    $prix = $_POST["unit_price"]; 
    $uniteEnStock = $_POST["units_in_stock"]; 
    $description = $_POST["description"];
    $idCategorie = $_POST["id_categorie"]; 
    $idSousCategorie = $_POST["id_sous_categorie"];
    $idProduit = $_POST["id_produit"];
    $produit->updateProduit($nom, $prix, $uniteEnStock, $description, $idCategorie, $idSousCategorie, $idProduit);    
}

/*---------------------------
            GESTION VUE
----------------------------*/
if(isset($_GET['id_sous_categorie']))
{
    $items = $produit->getAllProductsBySubCatId($_GET['id_sous_categorie']);
    require_once('View/shopDefault.php');
}
elseif(isset($_GET['id_categorie']))
{
    $items = $produit->getAllProductsByCatId($_GET['id_categorie']);
    require_once('View/shopDefault.php');
}
elseif(isset($_GET['searchBarIn']))
{
    $items = $produit->getProductsBySearch($_GET['searchBarIn']);
    require_once('View/shopDefault.php');
}
elseif(isset($_GET['article_id']))
{
    
    if(isset($_SESSION["droits"]) && $_SESSION["droits"] == 1337)
    {
        require_once('View/shopArticleAdmin.php');
    }
    else
    {
        require_once('View/shopArticle.php');
    }

}
elseif(isset($_GET['addProduit']))
{
    if(isset($_SESSION["droits"]) && $_SESSION["droits"] == 1337)
    {
        require_once('View/shopArticleAdd.php');
    }
    else
    {
        $items = $produit->getAllProductWithCatAndSubCat();
        require_once('View/shopDefault.php');
    }
}
else
{
    $items = $produit->getAllProductWithCatAndSubCat();
    require_once('View/shopDefault.php');
}