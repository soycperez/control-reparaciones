<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login Willtech</title>
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="css/FontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/BoostrapV5/bootstrap.min.css">
    <!-- MI css-->
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
    <div class="modal-dialog text-center">
        <div class="col main-section">
            <div class="modal-content">
                <div class="col user-img">
                    <img src="img/logo.png">
                </div>
                <h4>Bienvenido a Willtech México</h4>
                <form method="post" id="formLogin" action="">
                    <div class="form-group" id="usuario-group">
                        <input type="text" class="form-control mt-3" placeholder="Usuario" id="usuario" name="usuario">
                    </div>
                    <div class="form-group" id="contrasenia-gropu">
                        <input type="password" class="form-control mt-3" placeholder="Contraseña" id="contrasenia"
                            name="contrasenia">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-sign-in"></i>
                        Inciar sesión </button>
                    <?php
                        require_once("./Consultas/login-logica.php");
                        $dato = login::consultLogin();
                    ?>
                    <?php if ($dato): ?>
                    <!-- alerta -->
                    <div class="form-group">
                        <div class="mi-alerta alert small alert-danger mt-3" role="alert">
                            <span><?php print_r($dato); unset($dato);  ?></span>
                        </div>
                    </div>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>

<!-- MI scrips-->
<script src="./js/validaciones.js"></script>
<!--JQUERY y BOOTSTRAP-->
<script src="js/BoostrapV5Js/jquery-3.6.0.min.js"></script>
<script src="js/BoostrapV5Js/bootstrap.min.js"></script>
</body>
</html>