<?php
    class Usuarios{
        private $idUsuario;
        private $username; 
        private $cargo; 
        private $password; 

        public function __construct($username, $password, $cargo){
            $this->username = $username;
            $this->cargo = $cargo;
            $this->password = $password;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setUsername($username){
            $this->username = $username;
        }

        public function getCargo(){
            return $this->cargo;
        }

        public function setCargo($cargo){
            $this->username = $cargo;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->username = $password;
        }
    }

?>
