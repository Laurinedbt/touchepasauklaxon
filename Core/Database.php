<?php

class Database {
    public static function getConnection(): PDO {
        return new PDO(
            'mysql:host=localhost;dbname=touche_pas_au_klaxon;charset=utf8mb4', 
            'root', 
            ''
        );
    }
}

?>