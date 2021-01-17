<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/anadir.css">
    <link rel="shortcut icon" href="styles/imagenes/anadir (1).png"/>
</head>
<body>
    <a href="index.php" id="btn-volver" class="p-3"><img src="styles/imagenes/volver-flecha-izquierda.png"></a>
    <div class="container" id ="total">
        <form action="anadir.php" class="text-white">
            <h1 class="display-5 mb-5 text-center">Sólo llena los campos para guardar la anécdota de la persona.</h1>
            <div>
                <p>Nombre:</p>
                <input class="form-control" type="text" name="nombres" required>
            </div>
            <div>
                <p>Anécdota:</p>
                <textarea class="form-control mb-3" name="anecdota" id="anecdota" cols="150" rows="10"></textarea>
            </div>
            <div class="text-center">
                <input class="btn btn-primary mb-3" type="submit" id="anadir-btn" value="Agregar">
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
            if (!empty($_GET['nombres']) && !empty($_GET['anecdota'])){
                
                $nombre = $_GET['nombres'];
                $anecdota = $_GET['anecdota'];
                $sql_insert = "INSERT INTO usuarios (nombresUsuario, anecdota) VALUES ('$nombre', '$anecdota')";
                if ($conexion->query($sql_insert) === TRUE) {
                    echo '
                    <div class="conteiner text-center text-white pb-3">
                    <p id="confirmacion">¡Listo, la anécdota de "'.$nombre.'" ha sido agregada!</p>
                    <img src="styles/imagenes/checked.png">
                    </div>
                    ';
                }        
                else {
                    echo '
                    <div class="conteiner text-center text-white pb-3">
                    <p>¡ERROR! es probable que esta persona ya contó su anécdota.</p>
                    <img src="styles/imagenes/close.png">
                    </div>
                    ';
                }            
            }elseif(!empty($_GET['nombres']) && empty($_GET['anecdota'])){
                echo '
                <div class="conteiner text-center text-white pb-3">
                <p>¡ERROR! asegurate de llenar tanto el campo de la anécdota como el nombre.</p>
                <img src="styles/imagenes/close.png">
                </div>
                ';
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