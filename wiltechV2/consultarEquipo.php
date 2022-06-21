<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP y FONT AWESOME para el estilo de la pagina-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/consultarEquipo.css">


    <title>Consulte su equipo</title>
</head>

<body>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title">Bienvenido a Willtech México</h1>
                <p class="data"> En esta página podra consultar sus equipos telefonicos <br>
                    sin la necesidad de ir a sucursal, lo único que debe ingresar <br>
                    es su código de reparación brindado al registrar su reparacíon.
                </p>
            </div>
            <div class="modal-body cuerpo">
                <div class="row">
                    <div class="col-md-12 ">
                        <img src="./img/marcoTelefono.png" alt="">
                        <form method="get" action="" class="formulario">
                            <div class="form-group">
                                <label> Ingrese código de reparación</label>
                                <br>
                                <input type="text" name="idReparacion">
                            </div>
                            <center> <button type="submit" class="btn btn-primary">Consultar</button></center>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php
                    require_once("./Consultas/verificarEquipo.php");
                    $dato = verificarEquipo::consultarEquipo();
                    if ($dato):
                        if($dato[0]["estado"] == "1"){
                ?>
                <div class="form-group">
                    <div class="mi-alerta alert small alert-danger mt-3" role="alert">
                        <center><span><?php echo "Su equipo sigue en REPARACIÓN"; ?></span></center>
                    </div>
                </div>
                <?php
                        }else{
                            ?>
                        <div class="form-group">
                    <div class="mi-alerta alert alert-success mt-3" role="alert">
                        <center><span><?php echo "Su equipo esta ARREGLADO <br> pase a sucursal :D"; ?></span></center>
                    </div>
                </div>
                <?php
                        }
                    endif

                ?>
            </div>
        </div>
    </div>
    <!-- JQUERY y BOOSTRAP JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>