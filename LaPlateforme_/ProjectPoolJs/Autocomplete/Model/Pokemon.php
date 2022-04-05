<?php

require_once 'Model.php';

Class Pokemon extends Model
{
    public static function getAllPokemon()
    {
        // $sql = "SELECT CONCAT(pokemons.nom,' ',pokemons.type0,' ',pokemons.type1) as descript FROM pokemons";
        $sql = "SELECT * FROM pokemons";

        $result = self::selectQuery($sql);

        $search_result=$result->fetchAll(PDO::FETCH_ASSOC);
        
        return $search_result;
    }

    public static function getPokemonsBySearch($search)
    {
        $sql = "SELECT * FROM pokemons
        WHERE  id LIKE ?
            OR nom LIKE ?
            OR type0 LIKE ?
            OR type1 LIKE ?
            OR baseHP LIKE ?
            OR baseAttack LIKE ?
            OR baseDefense LIKE ?
            OR baseSP_Attack LIKE ?
            OR baseSp_Defense LIKE ?
            OR baseSpeed LIKE ?";

        $params = array("%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%",
                        "%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%",
                        "%".$search."%","%".$search."%");

        $result = self::selectQuery($sql, $params);

        $search_result=$result->fetchAll(PDO::FETCH_ASSOC);
        
        return $search_result;
    }

    public static function getPokemonById($id)
    {
        $params = array($id);

        $sql = "SELECT * FROM pokemons
                WHERE id LIKE ?";

        $result = self::selectQuery($sql, $params);

        $search_result = $result->fetch(PDO::FETCH_ASSOC);

        return $search_result;

    }

}

    