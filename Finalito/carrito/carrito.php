<?php
session_start();
include 'ConexionBD.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compra</title>
</head>
<body>
    <div class="container">
        <div class="filas">
            <div>
                <h1>Carrito de compra</h1>
                <a href="productos.php"><button>Productos</button></a>
                <br><br>
                <?php
                    $productos = $con->query("select * from producto");
                    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])):
                ?>  


                <table border="2">
                    <thead nigcolor="33ee44">
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Accion a realizar</th>
                    </thead>

                    <?php
                    foreach ($_SESSION['cart'] as $c):
                        $productos = $con ->query("select * from producto where id=$c[producto_id]");
                        $r= $productos->fetch_object();
                    ?>
                    <tr>
                        <th><?php echo $c["cant"]; ?></th>
                        <td>RD$ <?php echo $r->nombre; ?></td>
                        <td>RD$ <?php echo $c["cant"]*$r->precio;?></td>
                        <td style="width:260px">
                    
                    <?php 
                    
                    $found = false;
                    foreach($_SESSION["cart"]as $c)
                    {
                        if ($c["producto_id"]==$r->id)
                        $found=true;
                        break;
                    }
                    ?>
                    
                    <a href="acciones/delformcart.php?=<?php echo $c['producto_id'];?>">Eliminar</a>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <form action="process.php" method="post">
                    <div><br>
                    <label for="inputEmail">Correo Electronico</label>
                        <input type="email" name="email" id="inputEmail" placeholder="Correo del cliente" size="30px" required>
                </div>

                <div id="Procesarventa">
                    <br>
                    <input type="submit" value="">Procesar venta</div>
                </form>
                <?php
                else:
                ?>
                <h1>El carrito está vacío</h1>
                <?php endif;?>
            </div>

        </div>
    </div>    

</body>
</html>