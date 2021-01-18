<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="styles/imagenes/ver.png"/>
    <link rel="stylesheet" href="styles/ver.css">
</head>

<body>
    <a href="index.php" id="btn-volver" class="p-3"><img src="styles/imagenes/volver-flecha-izquierda.png"></a>
    <?php
        $servidor = "localhost";
        $usuario  = "root";
        $password = "";
        $nombreDB = "proyecto";
        $conexion = new mysqli($servidor, $usuario, $password, $nombreDB);
        $sql_seleccionar = "SELECT * FROM usuarios";
        $resultados = mysqli_query($conexion, $sql_seleccionar);
        if($resultados->num_rows > 0){
            echo '
                <div class="container">
                    <div class="row">
                        <div class="col text-center"><h1>Nombre</h1></div>
                        <div class="col text-center"><h1>Anécdota</h1></div>
                    </div>
            ';
            while ($consulta = mysqli_fetch_array($resultados)){
                echo '
                    <div class="row">
                        <div class="col text-center" id="nombre">
                            <p>'.$consulta["nombresUsuario"].'</p>
                        </div>
                        <div class="col text-center" id="anecdota">
                            <p>'.$consulta["anecdota"].'</p>
                        </div>
                    </div>
                ';
            }
        }else{
            echo '
                <div class="conteiner text-center text-white pb-3">
                <p>¡ERROR!, "No hay registros.</p>
                <img src="styles/imagenes/close.png">
                </div>
            ';
        }
    ?>
    <div class="text-center mt-3">
        <a href="index.php"><input class="btn btn-primary" type="button" id="btn-volver2" value="Volver"></a>
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