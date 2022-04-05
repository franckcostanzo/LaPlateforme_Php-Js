<?php

require_once('./Model/Pokemon.php');

if(isset($_POST['search']))
{
    $search = htmlspecialchars($_POST['searchText']);
    $_SESSION['pokemons'] = Pokemon::getPokemonsBySearch($search);
    header('location: ./recherche.php');

}