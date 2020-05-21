<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
    include "funcionesAccesoBD.php";
    echo "<br>";
    //conexion a BD prueba
    /* VERSIÓN OO */
    $name = $_REQUEST['fname'];
    $address = $_REQUEST['address'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];

    //checking if field name is empty
    if(strlen($name) == 0){
        echo "<div>";
        echo "<p>Do not leave field name empty!</p>";
        echo "</div>";
    } else {
        $sql = "INSERT INTO alumnos(nombre, direccion, email, telefono) 
                VALUES 
                ('$name','$address','$email','$phone')";
        if($idCone-> query($sql)){
            echo "<div>";
            echo "<p>".$idCone->affected_rows." student(s) inserted.</p>";
            echo "<p>Student ".$name." successfully inserted.</p>";
            echo "</div>";
        } else {
            echo "<div>";
            die ("No students inserted.Error: ". $idCone->error);
            echo "</div>";
        }
        $idCone->close();
    }
    ?>
    <br><br>
    <a href="insertar.html">[VOLVER]</a>
    </body>
</html>