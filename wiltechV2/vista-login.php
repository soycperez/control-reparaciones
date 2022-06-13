<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login Willtech</title>
    <!--JQUERY-->
    <script src="js/BoostrapV5Js/jquery-3.6.0.min.js"></script>
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="css/FontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/BoostrapV5/bootstrap.min.css">
    <script src="js/BoostrapV5Js/bootstrap.min.js"></script>
    <!-- MI css-->
    <link href="css/login.css" rel="stylesheet">
    <!-- MI scrips-->
    <script src="./js/validaciones.js"></script>

</head>
<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="img/logo.png">
                </div>
                <h4>Bienvenido a Willtech México</h4>
                <form class="col-12" method="post" id="formLogin" action="">
                    <div class="form-group" id="usuario-group">
                        <input type="text" class="form-control mt-3" placeholder="Usuario" id="usuario" name="usuario">
                    </div>
                    <div class="form-group" id="contrasenia-gropu">
                        <input type="password" class="form-control mt-3" placeholder="Contraseña" id="contrasenia"
                            name="contrasenia">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-sign-in" aria-hidden="true"></i>
                        Inciar sesión </button>
                    <?php
                        require_once("./Consultas/logica-login.php");
                        $dato = log::consultLogin();
                    ?>
                    <?php if ($dato): ?>
                    <!-- alerta -->
                    <div class="form-group col-sm-12">
                        <div class="mi-alerta alert small alert-danger mt-3" role="alert">
                            <span><?php print_r($dato); unset($dato);  ?></span>
                        </div>
                    </div>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>