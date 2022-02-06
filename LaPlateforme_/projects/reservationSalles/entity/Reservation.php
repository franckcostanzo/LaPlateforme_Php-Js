<?php 

class Reservation
{
    private $id;
    private $titre;
    private $debut;
    private $fin;
    private $description;
    private $username;

    public function __set($name, $value)
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDebut()
    {
        return $this->debut;
    }

    public function getFin()
    {
        return $this->fin;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getUsername()
    {
        return $this->username;
    }

}

?>