<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grabar clientes</title>
</head>

<body>
    <form action="ingresarclientes2.php" method="post">
        Ingrese el nombre del clientes
        <input type="text" name="nombre" size="30" required>
        <br>
        Ingrese el apellido del clientes
        <input type="text" name="apellidos" size="30" required>
        <br>
        Ingrese el sexo del clientes
        <input type="text" name="sexo" size="30" required>
        <br>
        <input type="submit" value="Confirmar">
    </form>

</body>
</html>