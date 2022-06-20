<?php
    class login{
        public static function consultLogin(){
            if(isset($_POST['usuario']) && isset($_POST['contrasenia'])){
                include ("./Conexion/conexion.php");
                //Establecemos conexión
                $coneccion = conexion::conectar();
                //Instaciamos los datos enviados en variables
                $usuario = $_POST['usuario'];
                $contrasenia = $_POST['contrasenia'];
                //Realizamos consulta
                $queryLogin = "SELECT E.idEmpleado, E.nombre, U.usuario, U.cargo  
                                FROM empleados E
                                INNER JOIN usuarios U ON E.idUsuario = U.idUsuario
                                WHERE u.usuario = ? AND u.contrasenia = ?";
                //$queryLogin = "SELECT * FROM usuarios WHERE usuario = ? AND contrasenia = ?";
                $queryLogin = $coneccion->prepare($queryLogin);
                $queryLogin->bindParam(1,$usuario, PDO::PARAM_STR, 50); 
                $queryLogin->bindParam(2,$contrasenia, PDO::PARAM_STR, 50); 
                $queryLogin->execute(); 
                //Retornarmos en un Array asosiativo todos los resultados
                $result_array = $queryLogin->fetchAll(PDO::FETCH_ASSOC);
                //Si empty es false signficia que tiene datos, si regres true, signifca que esta vacion.
                if(!empty($result_array)){
                    //Verificamos datos en vector
                    echo "<br>";
                    echo "<pre>"; 
                    var_dump($result_array);
                    echo "</pre>"; 
                    //Recuperamos los datos que nos importan para la sesión
                    $cargo =  $result_array[0]["cargo"];
                    $usuario = $result_array[0]["usuario"]; 
                    $idUsuario = $result_array[0]["idEmpleado"]; 
                    $nombre = $result_array[0]["nombre"];
                    //Iniciamos el guardado de la sesión 
                    session_start(); 
                    $_SESSION["idEmpleado"]  = $idUsuario; 
                    $_SESSION["usuario"]  = $usuario; 
                    $_SESSION["cago"] = $cargo;
                    $_SESSION["nombre"] = $nombre;
                    //$_SESSION["contrasenia"] = $contrasenia;
                    if($cargo == 'admin'){
                        header("Location: ./vista-admin.php");
                    }else{
                       header("Location: ./vista-trabajador.php");
                    }
                }else{
                    unset($result_array);
                    return "Usuario no registrado"; 
                }
            }
        }

        public static function cerrarSesion(){
            session_start();
            $_SESSION = array(); 
            // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
            // Esto destruirá la sesión, y no la información de la sesión
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            // Finalmente, destruir la sesión.
            session_destroy();
            header("location:../vista-login.php");
        }
    }
