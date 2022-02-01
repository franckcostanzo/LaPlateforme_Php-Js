<?php declare(strict_types=1);

class Carte {

    private int $id;
    private string $imgSrc;
    private bool $isDiscovered = false;

    public function __construct() {}

    public function getId ()
    {
        return $this->id;
    }

    public function setId (int $id)
    {
        $this->id = $id;
    }
    
    public function getimgSrc ()
    {
        return $this->imgSrc;
    }

    public function setimgSrc (string $imgSrc)
    {
        $this->imgSrc = $imgSrc;
    }

    public function getisDiscovered ()
    {
        return $this->isDiscovered;
    }

    public function setisDiscovered (bool $isDiscovered)
    {
        $this->isDiscovered = $isDiscovered;
    }
}


?>