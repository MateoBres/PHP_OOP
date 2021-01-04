<?php

    class Conexion
    {
        private static $link;

        private function __construct()
        {} // impedimos instanciar la clase

        static function conectar()
        {
            if( !isset( self::$link ) ){
                self::$link = new PDO(
                    'mysql:host=localhost;dbname=agencia',
                    'root',
                    ''
                );
            }

            // control de errores
            self::$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

            return self::$link;
        }

    }