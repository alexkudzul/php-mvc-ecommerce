<?php

class Database{
    /**
     * utf8, configura la codificacion de caracteres, si la DB devulve una tilde o ñ, lo devolvera en formato castellano
     */
    public static function connect(){

        $db = new mysqli('localhost', 'root', '', 'php_mvc_ecommerce');
        $db->query("SET NAMES 'utf8'");

        return $db;
    }
}

?>