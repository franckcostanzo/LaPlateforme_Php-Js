<?php 

require_once 'Model/Model.php';

Class SousCategorie extends Model
{
    function __construct(){}

    public function getAllSubCat()
    {
        $sql = "SELECT sous_categories.*, categories.nom_categorie
                FROM sous_categories
                INNER JOIN categories ON categories.id_categorie = sous_categories.id_categorie";

        $infos = $this->selectQuery($sql)->fetchAll(PDO::FETCH_ASSOC);

        return $infos;

    }
    
}