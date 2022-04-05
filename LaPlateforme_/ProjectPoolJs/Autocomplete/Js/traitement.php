<?php 

include_once('..\Model\Pokemon.php');

$pokemons = Pokemon::getAllPokemon();

$pokemonsJSON = json_encode($pokemons);

echo $pokemonsJSON;