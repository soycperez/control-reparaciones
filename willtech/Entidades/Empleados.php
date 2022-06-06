<?php

    //require_once 'Usuarios.php';
    //require_once((__FILE__) . "Entidades/Usuarios.php");
    
    class Empleados{
        private $idEmpleado; 
        private $nombre; 
        private $apellidos; 
        private $usuarios; 

        public function __construct($nombre, $apellidos, $usuarios){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->usuarios = $usuarios;
        }

        public function getNombre(){
            return $this->nombre;
        }
        
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getApellidos(){
            return $this->apellidos;
        }
        
        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }

        
        public function getUsuario(){
            return $this->usuarios;
        }
        
        public function setUsuario($usuarios){
            $this->usuarios = $usuarios;
        }

    }     
    
?>

