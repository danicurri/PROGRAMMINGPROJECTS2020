<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        p{
            color: red;
            font-size: large;
        }
    </style>
</head>
<body>
    <h2>INSERCIÓN DE VIVIENDA</h2>
    <fieldset>   
        <?php
            $errorGeneral = False;
            $errorDireccion = False;
            $errorPrecio = False;
            $errorTamanyo = False;
            $errorExtras = False;
            $errorFoto = FALSE;
            $vivienda = $_REQUEST["vivienda"];
            $zona = $_REQUEST['zona'];
            $direccion = $_REQUEST['direccion'];
            $dormitorios = $_REQUEST['dormitorios'];
            $precio = $_REQUEST['precio'];
            $tamanyo = $_REQUEST['tamanyo'];
            $extras = $_REQUEST['extras'];
            $observaciones = $_REQUEST['observaciones'];
            $foto = $_FILES['foto']['name'];
            $tamanyoFoto = $_FILES['foto']['size'];
            

            if(isset($_REQUEST["insertar"]))
            {   
                //validación errores
                if(strlen($direccion) == 0)
                {
                    $errorGeneral = True;
                    $errorDireccion = True;
                }
                if((strlen($precio) == 0) || !(is_numeric($precio)))
                {
                    $errorGeneral = True;
                    $errorPrecio = True;
                }
                if((strlen($tamanyo) == 0) || !(is_numeric($tamanyo)))
                {
                    $errorGeneral = True;
                    $errorTamanyo = True;
                }
                if((count($extras) == 0))
                {
                    $errorGeneral = True;
                    $errorExtras = True;
                }   
                if($tamanyoFoto > 200000)
                {
                    $errorGeneral = TRUE;
                    $errorFoto = TRUE;
                }
            }
            
            //pulsamos enviar y no hay errores => procesamos datos
            if(isset($_REQUEST["insertar"]) && $errorGeneral == False)
            {
                echo "Los datos de la vivienda son: <br>";
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
                echo "Dormitorios: ".$dormitorios;
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
                    $extra;
                }
                echo "</li>";
                echo "<li>";
                echo "Observaciones: ".$observaciones;
                echo "</li>";
                //foto
                echo "<li>";
                echo "Foto: ";
                if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
                    $nomDir = "img/";
                    $idUnico = time();
                    $nomFichero = $idUnico . " - " . ($_FILES['foto']['name']);
                    move_uploaded_file($_FILES['foto']['tmp_name'],
                                        $nomDir . $nomFichero);
                    echo "Archivo ". $_FILES['foto']['name'] ." subido con éxito.\n";
                ?>
                    <a href="img/<?php $nomFichero;?>" target="_blank">FOTO</a>
                <?php
                 } else {
                    echo "No se ha realizado con éxito la subida del archivo: ";
                    echo "nombre del archivo '". $_FILES['foto']['tmp_name'] . "'.";
                 }
                 echo "</li>";
                 echo "<br>";
                echo "</ul>";
                ?>
                <a href="Eje5.php">[VOLVER]</a>
            <?php
            }
            //si se pulsa botón enviar pero hay errores, hay que mostrar el formulario con los errores 
            else
            {
        ?>
        
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ENCTYPE="multipart/form-data"> 
                    Tipo de Vivienda: <select name="vivienda" size="1">
                        <option value="Piso">Piso</option>
                        <option value="Adosado">Adosado</option>
                        <option value="Chalet">Chalet</option>
                        <option value="Casa">Casa</option>
                    </select> <br/><br/>
                    
                    Zona: <select name="zona" size="1">
                        <option value="Centro">Centro</option>
                        <option value="Nervion">Nervion</option>
                        <option value="Triana">Triana</option>
                        <option value="Aljarafe">Aljarafe</option>
                        <option value="Macarena">Macarena</option>
                    </select> <br/><br/>
                    
                    Direccion: <input type="text" name="direccion"> <br/><br/>
                <?php
                    if($errorDireccion)
                    {
                        echo "<p>La dirección no se puede dejar en blanco.</p><br>";
                    }
                ?>
                    Número de dormitorios:
                    <INPUT TYPE="radio" NAME="dormitorios" value="1" CHECKED>1
                    <INPUT TYPE="radio" NAME="dormitorios" value="2">2
                    <INPUT TYPE="radio" NAME="dormitorios" value="3">3
                    <INPUT TYPE="radio" NAME="dormitorios" value="4">4
                    <INPUT TYPE="radio" NAME="dormitorios" value="5">5
                    <br><br>
            
                    Precio: <input type="text" name="precio"> <br/><br/>
                    <?php
                    if($errorPrecio)
                    {
                        echo "<p>El precio no se puede dejar en blanco y debe ser un número. </p><br>";
                    }
                    ?>
                    Tamaño: <input type="text" name="tamanyo"> <br/><br/>
                    <?php
                    if($errorTamanyo)
                    {
                        echo "<p>El tamaño no se puede dejar en blanco y debe ser un número.</p><br>";
                    }
                    ?>
                    Extras:
                    <INPUT TYPE="checkbox" NAME="extras[]" VALUE="garaje" CHECKED>Garaje
                    <INPUT TYPE="checkbox" NAME="extras[]" VALUE="piscina">Piscina
                    <INPUT TYPE="checkbox" NAME="extras[]" VALUE="jardin">Jardín
                    <?php
                    if($errorExtras)
                    {
                        echo "<p>Algún extra debe estar marcado.</p><br>";
                    }
                    ?>
                    <br/><br/>
                    Imagen: <br>
                    <input type="hidden" name="max_size" value="200000">
                    <input type="file" name="foto">
                    <?php
                    if($errorFoto)
                    {
                        echo "<p>Tamaño no debe superar 200Kb.</p><br>";
                    }
                    ?>
                    <br><br>
                    Observaciones:<br/>
                    <textarea name="observaciones" rows="4" cols="50"></textarea>
                    <br/><br/>
                <input id="button" value="Insertar vivienda" name="insertar" type="submit"><br />
                </form>
                </fieldset>
            <?php
            }
        ?>
    
</body>
</html>