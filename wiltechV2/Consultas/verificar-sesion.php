<?php
    class verificar{
        public static function consulAdmin(){
            //iniamos sesión registrada
            session_start(); 
            //Si las variables NO estan definidas el metodo ISSET() retorna FALSE
            if(!isset($_SESSION["idEmpleado"],$_SESSION["usuario"], $_SESSION["cago"])){
                header("Location: ./vista-login.php");
            }else{
                $cargo = $_SESSION["cago"]; 
                if($cargo != 'admin'){
                    header("Location: ./vista-trabajador.php");
                }
            }
        }
        public static function consulEmpleado(){
            //iniamos sesión registrada
            session_start(); 
            //Si las variables NO estan definidas el metodo ISSET() retorna FALSE
            if(!isset($_SESSION["idEmpleado"],$_SESSION["usuario"], $_SESSION["cago"])){
                header("Location: ./vista-login.php");
            }else{
                $cargo = $_SESSION["cago"]; 
                if($cargo != 'tecnico'){
                    header("Location: ./vista-admin.php");
                }
            }
        }
    }
