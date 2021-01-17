<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/modificar.css">
    <link rel="shortcut icon" href="styles/imagenes/pincel.png"/>
</head>
<body>
    <a href="index.php" id="btn-volver" class="p-3"><img src="styles/imagenes/volver-flecha-izquierda.png"></a>
    <div class="container text-white" id="total">
        <h1 class="text-center">Modifica alguna anécdota ingresando el nombre de la persona.</h1>
        <div>
            <form action="modificar.php" method="GET">
                <p class="text-white">Nombre:</p>
                <input type="text" name="nombre" class="form-control" required>
                <div class="mt-3">
                    <p>Anécdota:</p>
                    <textarea class="mt-3" name="anecdota" cols="150" rows="10"></textarea>
                </div>
                <div class="text-center mt-3 pb-3">
                    <input type="submit" id="mod-btn" class="btn btn-primary" value="Modificar">
                </div>
            </form>
            <?php
                $servidor = "localhost";
                $usuario  = "root";
                $password = "";
                $nombreDB = "proyecto";
                $conexion = new mysqli($servidor, $usuario, $password, $nombreDB);

                if ($conexion->connect_error) {
                    die('<div class="conteiner text-center text-white pb-3">
                    <p>¡ERROR!, no se puede conectar con la base de datos.</p>
                    <img src="styles/imagenes/close.png">
                    </div>');
                }

                if(!empty($_GET['nombre']) && !empty($_GET['anecdota'])){
                    $nombre = $_GET['nombre'];
                    $anecdota = $_GET['anecdota'];
                    $sql_seleccionar = "SELECT * FROM usuarios WHERE nombresUsuario = '$nombre'";
                    $respuesta = $conexion->query($sql_seleccionar);
                    if ($respuesta->num_rows > 0) {                    
                        $sql_modificar = "UPDATE usuarios SET anecdota = '$anecdota' WHERE nombresUsuario='$nombre'";
                        if ($conexion->query($sql_modificar) === TRUE) {
                            echo '
                            <div class="conteiner text-white text-center pb-3">
                            <p>¡Listo!, la anécdota de "'.$nombre.'" ha sido actualizada.</p>
                            <img src="styles/imagenes/checked.png">
                            </div>
                            ';
                        } 
                    } else {
                        echo '
                        <div class="conteiner text-center text-white pb-3">
                        <p>¡ERROR!, "'.$nombre.'" no se encuentra en nuestros registros.</p>
                        <img src="styles/imagenes/close.png">
                        </div>
                        ';
                    }
                }elseif (!empty($_GET['nombre']) && empty($_GET['anecdota'])){
                    echo '
                    <div class="conteiner text-center text-white pb-3">
                    <p>¡ERROR! asegurate de llenar tanto el campo de la anécdota como el nombre.</p>
                    <img src="styles/imagenes/close.png">
                    </div>
                    ';
                }
                $conexion->close();
            ?>

        </div>
    </div>



    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>
</html>