<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        //conexion a BD prueba  
        $idCone = new mysqli();
        $idCone-> connect('localhost', 'Dani', '', 'ALUMNOS');
        if(!@idCone )
            die("Error de conexion: ". $idCone->connect_errno. " Motivo: " . $idCone->mysqli_connect_error());
        echo "Conexión realizada con éxito".$idCone->server_info."<br>";

        //posibilidad de cambio de BD
        /*
        $baseDeDatos = 'ALUMNOS';
        $idCone->select_db($baseDeDatos);
        */
    ?>
</body>
</html>