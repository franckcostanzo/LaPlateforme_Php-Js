<?php

require_once 'Model/Model.php';

class Product extends Model{

    private $product_id;
    private $product_name;
    private $img_url;
    private float $unit_price;
    private $product_description;
    private $units_in_stock;
    private $category_name;
    private $subcategory_name;

    public function __set($name, $value)
    {

    }

    public function getAllProducts()
    {
                //getting reservation of the day
        $sql =  "SELECT products.*, categories.category_name, subcategories.subcategory_name
                FROM products
                INNER JOIN categories       ON products.category_id = categories.category_id
                INNER JOIN subcategories    ON products.subcategory_id = subcategories.subcategory_id";

        $selectQuery = $this->executerRequete($sql);

        //converting every items to reservation class
        return $selectQuery->fetchAll(PDO::FETCH_CLASS, 'product');
    }

    public function getAllInfo($id)
    {
        $params = array($id);
        //getting reservation of the day
        $sql =  "SELECT products.*, categories.category_name, subcategories.subcategory_name
                FROM products
                INNER JOIN categories       ON products.category_id = categories.category_id
                INNER JOIN subcategories    ON products.subcategory_id = subcategories.subcategory_id
                WHERE products.product_id LIKE ?";

        $selectQuery = $this->executerRequete($sql, $params);

        //converting every items to reservation class
        return $selectQuery->fetchAll(PDO::FETCH_CLASS, 'product');
    }

    public function getId()
    {
        return $this->product_id;
    }

    public function getProductName()
    {
        return $this->product_name;
    }
    
    public function getImgUrl()
    {
        return $this->img_url;
    }

    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    public function getProductDescription()
    {
        return $this->product_description;
    }

    public function getUnitsInStock()
    {
        return $this->units_in_stock;
    }

    public function getCategoryName()
    {
        return $this->category_name;
    }

    public function getSubcategoryName()
    {
        return $this->subcategory_name;
    }
}
