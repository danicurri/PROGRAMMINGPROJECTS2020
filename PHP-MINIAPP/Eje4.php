<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>INSERCIÓN DE VIVIENDA</h2>
    <?php
    $error = FALSE;
    $errorPrecio = FALSE;
    $errorTamanyo = FALSE;
    $errorDireccion = FALSE;
    $errorExtras = FALSE;
    $vivienda = $_REQUEST["vivienda"];
    $zona = $_REQUEST["zona"];
    $direccion = $_REQUEST["direccion"];
    $dormitorios = $_REQUEST["dormitorios"];
    $precio = $_REQUEST["precio"];
    $tamanyo = $_REQUEST["tamanyo"];
    $extras = $_REQUEST["extras"];
    $caja = $_REQUEST["caja"];

    //vamos a validar errores
    if(strlen($precio) == 0 || !(is_numeric($precio)))
    {
        $error = TRUE;
        $errorPrecio = TRUE;
    }
    if(strlen($tamanyo) == 0 || !(is_numeric($tamanyo)))
    {
        $error = TRUE;
        $errorTamanyo = TRUE;
    }
    if(strlen($direccion) == 0)
    {
        $error = TRUE;
        $errorDireccion = TRUE;
    }
    if(count($extras) == 0)
    {
        $error = TRUE;
        $errorExtras = TRUE;
    }
    echo "<div>";
    //si se envía pero hay algún tipo de error 
    if(isset($_REQUEST["insertar"]) && $error == TRUE)
    {
        if($errorPrecio){//si el error es del precio
            echo "<ul>";
            echo "<li>";
            echo "Precio debe ser un valor numérico";
            echo "</li>";
            echo "</ul>";
        }
        if($errorTamanyo){
            echo "<ul>";
            echo "<li>";
            echo "Tamaño debe ser un valor numérico";
            echo "</li>";
            echo "</ul>";
        }
        if($errorDireccion){
            echo "<ul>";
            echo "<li>";
            echo "Dirección debe ser un valor numérico";
            echo "</li>";
            echo "</ul>";
        }
        if($errorExtras){
            echo "<ul>";
            echo "<li>";
            echo "Extras debe tener un valor marcado";
            echo "</li>";
            echo "</ul>";
        }
        ?>
        <br><br>
        <a href="Eje4.html">[VOLVER]</a>
        <?php
    }

    //si se envía sin errores 
    if(isset($_REQUEST["insertar"]) && $error == FALSE)
    {
        echo "Estos son los datos introducidos: <br/>";
        echo "<ul>";
        echo "<li>";
        echo "Tipo: ".$vivienda;
        echo "</li>";
        echo "<li>";
        echo "Zona: ".$zona;
        echo "</li>";
        echo "<li>";
        echo "Dirección: ".$direccion;
        echo "</li>";
        echo "<li>";
        echo "Número de dormitorios: ".$dormitorios;
        echo "</li>";
        echo "<li>";
        echo "Precio: ".$precio;
        echo "</li>";
        echo "<li>";
        echo "Tamaño: ".$tamanyo;
        echo "</li>";
        echo "<li>";
        echo "Extras: ";
        foreach($extras as $extra){
            echo $extra;
        }
        echo "</li>";
        echo "<li>";
        echo "Observaciones: ".$caja;
        echo "</li>";
        echo "<ul>";
        ?>
        <br><br>
        <a href="Eje4.html">[Insertar otra vivienda]</a>
        <?php
    }
    echo "</div>";
    ?>

</body>
</html>