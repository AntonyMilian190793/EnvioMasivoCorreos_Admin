<?php

    session_start();

    class Conectar{

        protected $dbh;

        protected function conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=administracion", "root", "");
                return $conectar;
            }catch(Exception $e){
                print "Error: " .$e->getMessage() . "<br>";
                die();
            }
        }
        
        public function set_names(){
            return $this->conexion()->query("SET NAMES 'utf8'");
        }

        public static function ruta(){
            return "http://localhost/Admininistracion/";
        }
    }


?>