<?php
    class Conexion{
        public static function conectar(){
            try {
                $cnn = new PDO("mysql:host=localhost;dbname=control_reparaciones","root","", array(PDO::ATTR_PERSISTENT => true));
                $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
                //echo "Conexion establecida".  "<br>";
                return $cnn;
            } catch (Exception $e) {
                echo "ERROR ".$e->getMessage();
                echo "Fail conexion";
            }        
        }
    }
 
   

?>