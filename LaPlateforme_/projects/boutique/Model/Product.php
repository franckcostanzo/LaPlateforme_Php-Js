<?php

require_once 'Model/Model.php';

class Product extends Model{

    private $product_id;
    private $product_name;
    private $img_url;
    private $unit_price;
    private $product_description;
    private $units_in_stock;
    private $category_name;
    private $subcategory_name;

    public function __set($name, $value)
    {

    }

    public function getAllInfo($name)
    {
        $params = array($name);
        //getting reservation of the day
        $sql =  "SELECT products.*, categories.category_name, subcategories.subcategory_name
                FROM products 
                INNER JOIN to_belong_to     ON products.product_id = to_belong_to.product_id
                INNER JOIN categories       ON to_belong_to.category_id = categories.category_id
                INNER JOIN subcategories    ON categories.category_id = subcategories.category_id
                WHERE products.product_name LIKE ?";

        $selectQuery = $this->executerRequete($sql,$params);

        //converting every items to reservation class
        return $selectQuery->fetchAll(PDO::FETCH_CLASS, 'product');
    }
    
    public function getImgUrl()
    {
        return $this->img_url;
    }
}
