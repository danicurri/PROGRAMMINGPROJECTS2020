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
    
    //conexion a BD prueba
    /* VERSIÓN OO */
    $name = $_REQUEST['fname'];
    $noStudent = false;
    if(strlen($name) == 0){
        $noStudent  = true;
    }
    
    if($noStudent){
        $sql1 = "SELECT * FROM alumnos";
        if($Recordset1 = $idCone -> query ($sql1)){
            echo "<p>Total number of students is: ";
            echo $idCone -> affected_rows."</p><br>";
            ?>
            <div>
            <table>
                <tr> 
                    <th>NAME</th>
                    <th>ADDRESS</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                </tr>
            <?php     
            While ($registro1= $Recordset1-> fetch_array())
            {
                ?>
                    <tr>    
                        <td><?php echo $registro1[0];?></td>
                        <td><?php echo $registro1[1];?></td>
                        <td><?php echo $registro1[2];?></td>
                        <td><?php echo $registro1[3];?></td>
                    </tr>    
                <?php            
            }
            echo "</table>";
            echo "</div>";
        }
        $Recordset1->free();
    }
    else {
        $sql = "SELECT * FROM alumnos where nombre='$name'";
        if($Recordset = $idCone -> query ($sql)){
            if($idCone -> affected_rows < 1){
                echo "<div>";
                die ("No students with the name of ".$name);
                echo "</div>";
            } else {
                While ($registro= $Recordset-> fetch_array())
                {
                    echo "<p>The student you are looking for is: </p>";
                    ?>
                    <div>
                        <table>
                            <tr> 
                                <th>NAME</th>
                                <th>ADDRESS</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                            </tr>
                            <tr>    
                                <td><?php echo $registro[0]?></td>
                                <td><?php echo $registro[1]?></td>
                                <td><?php echo $registro[2]?></td>
                                <td><?php echo $registro[3]?></td>
                            </tr>    
                        </table>
                    </div>
                    <br><br>
                    <?php            
                }
            }
            $Recordset->free();
        }
    }
    $idCone->close();
    ?>
    <br><br>
    <a href="consultar.html">[VOLVER]</a>
    </body>
</html>