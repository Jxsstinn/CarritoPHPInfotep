<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de dato</title>
</head>
<body>
        <?php
        $id= $_POST['id'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellido'];
        $sexo=$_POST['sexo'];

        include ('ConexionBD.php');
        $con = $con;

        $sql = "update clientes set nomcli='$nombre',apecli='$apellidos',sexcli='$sexo' where codcli='$id'";
        mysqli_query($con,$sql);
        mysqli_close($con);
        
        echo "
        <p> Los datos han sido actualizados correctamente </p>
        <p> <a href='javascript:history.go(-1)'>Volver Atras </a></p>
        <p> <a href='javascript:history.go(-2)'>Volver Al inicio </a></p>
        
        
        ";
        ?>

</body>
</html>