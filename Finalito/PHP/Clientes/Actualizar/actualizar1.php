<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos a actualizar</title>
</head>
<body>

<?php
error_reporting(-1);
$id=$_POST['id'];
include 'ConexionBD.php';
$con = $con;

$sql = "select * from clientes where codcli = '$id'";
$result = mysqli_query($con,$sql);
if (!$result)
{
   
}
while($registro=mysqli_fetch_array($result))
{
    echo "
    <div align='center'>
    <h3> Actualize los datos que considere </h3>
    <p>En los campos del formulario puede ver los valores actualues,
    si no se cambian los valores se mantienen iguales</p>
    
    
    <form action='actualizar2.php' method='post'>
    <table border='0'>
    <tr>
        <td width='50%'>
        <strong>Nombre</strong>
        </td>

        <td width='50%'>
        <input type='text' name='nombre' size='30' value='".$registro['nomcli']."'>
        </td>

        <td width='50%'>
        <strong>Apellido</strong>
        </td>
        
        <td width='50%'>
        <input type='text' name='apellido' size='30' value='".$registro['apecli']."'>
        </td>
        
        
        <td width='50%'>
        <strong>Sexo</strong>
        </td>
        
        <td width='50%'>
        <input type='text' name='sexo' size='30' value='".$registro['sexcli']."'>
        </td>
        
        </tr>

        <input type='hidden' name='id' value='$id'>
        
        </table>
        <p align='center'>
            <input type='submit' value='Actualizar datos' name='B1'>
            </p>
            </form>        
            </div>
        ";
}

mysqli_close($con);
?>


</body>
</html>