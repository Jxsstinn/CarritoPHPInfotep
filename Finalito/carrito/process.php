<?php
session_start();
include "ConexionBD.php";
if(!empty($_POST))
{
    $sql = $con->query("insert into carrito(correocli,creado) values (\"%_POST[email]\",now())");
    if($sql)
    {
        $carrito_id = $con ->insert_id;
        foreach($_SESSION["cart"]as $c)
        {
            $sql= $con->query("insert into carrito_producto(producto_id,cant,carrito_id) values ($c[producto_id], $c[cant],$carrito_id)");
        }
        unset($_SESSION["cart"]);

    }
}

?>