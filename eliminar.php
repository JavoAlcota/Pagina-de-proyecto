<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eliminar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/eliminar.css">
    <link rel="shortcut icon" href="styles/imagenes/eliminar.png"/>
</head>
<body>
    <a href="index.php" id="btn-volver" class="p-3"><img src="styles/imagenes/volver-flecha-izquierda.png"></a>
    <div class="container">
        <h1 class="text-center text-white">Elimina el nombre junto con su anécdota. Sólo ingresa el nombre de la persona que quieres eliminar.</h1>
        <form action="eliminar.php" method="GET">
            <div>
                <h3 class="text-white">Nombre:</h3>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="text-center mt-3 pb-3">
                <input type="submit" id="eliminar-btn" class="btn btn-danger" value="Eliminar">
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
            if(!empty($_GET['nombre'])){
                $nombre = $_GET['nombre'];
                $sql_seleccionar = "SELECT * FROM usuarios WHERE nombresUsuario = '$nombre'";
                $respuesta = $conexion->query($sql_seleccionar);
                if ($respuesta->num_rows > 0) {                    
                    $sql_eliminar = "DELETE FROM usuarios WHERE nombresUsuario = '$nombre'";
                    if ($conexion->query($sql_eliminar) === TRUE) {
                        echo '
                        <div class="conteiner text-white text-center pb-3">
                        <p>¡Listo!, "'.$nombre.'" y su anécdota han sido eliminados.</p>
                        <img src="styles/imagenes/checked.png">
                        </div>
                        ';
                    } else {
                        echo "Error: " . $sql_eliminar . "<br>" . $conexion->error;
                    }
                } else {
                    echo '
                    <div class="conteiner text-center text-white pb-3">
                    <p>¡ERROR!, "'.$nombre.'" no se encuentra en nuestros registros.</p>
                    <img src="styles/imagenes/close.png">
                    </div>
                    ';
                }
                $conexion->close();
            }
        ?>
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