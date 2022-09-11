<?php
    
    class DB {
        
        /**
         * Método responsável pela conexão do banco de dados
         *
         * @return PDO
         */
        public static function connect() {

            $host = DB_HOST;
            $user = DB_USER;
            $pass = DB_PASS;
            $db_name = DB_NAME;

            return new PDO("mysql:host={$host};dbname={$db_name};chartset=UTF8;",$user,$pass);
        }

    }
?>