<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingressar clientes</title>
</head>

<body>
    <?php
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $sexo = $_POST['sexo'];
    include ('ConexionBD.PHP');
    $con = $con;
    if ($con ->connect_error)
    die("Problemas con la conexion a la base de datos");
    
    $registro = $con->query("select codcli from clientes where nomcli='$_POST[nombre]'")
    or die ($con->error);


    if ($registro->fetch_array())
        echo "Ya existe un cliente con ese nombre ingresado";
    else
    {
        $con->query("insert into clientes(nomcli, apecli, sexcli) values ('$_POST[nombre]','$_POST[apellido]','$_POST[sexo]')")
        or die($con->error);
    }

?>

</body>

</html>