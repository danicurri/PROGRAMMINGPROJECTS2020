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
    
    if(!isset($_POST['update']))
    {
        /* VERSIÓN OO */
        $name = $_REQUEST['fname'];

         //checking if field name is empty
        if(strlen($name) == 0){
            echo "<div>";
            echo "<p>Do not leave field name empty!</p>";
            echo "</div>";
        } else {
                    $sql = "SELECT * FROM alumnos where nombre='$name'";
                    if($Recordset = $idCone -> query ($sql)){
                        if($idCone -> affected_rows < 1){
                            echo "<div>";
                            die ("No students unders the name of ".$name);
                            echo "</div>";
                        } else {
                            while ($registro= $Recordset-> fetch_array())
                            {
                                ?>
                                <div>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <label for="fname">First name:&nbsp;&nbsp;</label>
                                    <input type="text" id="fname" name="newfname" value="<?php echo $registro[0];?>">
                                    <input type="hidden" id="custId" name="hiddenName" value="<?php echo $registro[0];?>"><br><br>
                                    <label for="address">Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" id="address" name="newaddress" value="<?php echo $registro[1];?>"><br><br>
                                    <label for="email">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" id="email" name="newemail" value="<?php echo $registro[2];?>"><br><br>
                                    <label for="phone">Telephone:&nbsp;</label>
                                    <input type="text" id="phone" name="newphone" value="<?php echo $registro[3];?>"><br><br>
                                    <input type="submit" name="update" value="Modify">
                                    </form>
                                    </div>
                                <?php
                            }
                            $Recordset->free();
                        }
                    }
                    $idCone->close();
                }
    } 
    
    if(isset($_POST['update']))
    {
        $newName = $_REQUEST['newfname'];
        $newAddress = $_REQUEST['newaddress'];
        $newEmail = $_REQUEST['newemail'];
        $newPhone = $_REQUEST['newphone'];
        $hiddenName = $_REQUEST['hiddenName'];
        echo $newName;
        echo $updatedName;
        $sql = "UPDATE alumnos set nombre = '$newName',
        direccion = '$newAddress',
        email = '$newEmail',
        telefono = '$newPhone'
        where nombre = '$hiddenName';";
     
        if(strlen($newName)== 0){
            echo "<div>";
            echo "<p>Do not leave field name empty!</p>";
            echo "</div>";
        }else {
            echo "<div>";
            if($idCone-> query($sql)){
            echo "<p>Student ".$newName." successfully updated.</p>";
            } else {
            die ("No students updated.Error: ". $idCone->error);
            }
            echo "</div>";
            $idCone->close();
        }
    }
    ?>
    <br><br>
    <a href="modificar.html">[VOLVER]</a>
    </body>
</html>