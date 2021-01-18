<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Buscar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/buscar.css">
    <link rel="shortcut icon" href="styles/imagenes/lupa.png"/>
</head>

<body>
    <a href="index.php" id="btn-volver" class="p-3"><img src="styles/imagenes/volver-flecha-izquierda.png"></a>
    <div class="container">
        <form action="buscar.php" method="POST">
            <div class="text-center">
                <h1 class="text-white display-3">Ingrese el nombre de la persona para ver su anécdota.</h1>
            </div>
            <div>
                <h1 class="text-white">Nombre:</h1>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="text-center mt-3 pb-3">
                <input class="btn btn-primary" type="submit" id="buscar-btn" value="Buscar">
            </div>
        </form>
    </div>
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
        if (!empty($_POST['nombre'])){
            $nombre=$_POST['nombre'];
            $sql_seleccionar = "SELECT * FROM usuarios WHERE nombresUsuario='$nombre'";
            $resultados = mysqli_query($conexion, $sql_seleccionar);
            if($resultados->num_rows > 0){
                while ($consulta = mysqli_fetch_array($resultados)){
                    echo '
                    <div class="container text-white text-center">
                    <h3 class="text-center">Anécdota:</h3>
                    <p>'.$consulta["anecdota"].'</p>
                    </div>
                    ';
                }
            }else{
                echo '
                    <div class="conteiner text-center text-white pb-3">
                    <p>¡ERROR!, "'.$nombre.'" no se encuentra en nuestros registros.</p>
                    <img src="styles/imagenes/close.png">
                    </div>
                ';
            }
            
        }
        
        $conexion->close();
    ?>


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