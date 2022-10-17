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
    <title>Seleccionar Productos</title>
</head>
<body>
    <div class="container">
        <div class="filas">
            <div>
                <h1>Seleccione o agregue sus productos</h1>
                    <button><a href="./carrito.php">Ver Carrito</a></button>
                    <br><br>
                    <?php
                    $productos = $con->query("select * from producto");
                    ?>

                    <table class="table1">
                        <thead>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th></th>
                        </thead>
                        <?php
                        while($r=$productos->fetch_object()):?>
                        <tr>
                            <td><?php echo $r->nombre;?></td>
                            <td>RD$ <?php echo $r->precio;?></td>
                            <td style='width:260px;'>
                            <?php
                            $found = false;

                            if(isset($_SESSION['cart']))
                            {
                                foreach ($_SESSION["cart"]as $c)
                                {
                                    if($c["producto_id"]==$r->id)
                                    {
                                        $found = true;
                                        break;
                                    }
                                }
                            }
                            ?>

                            <?php
                            if($found):
                            ?>
                            <button><a href="carrito.php">Agregado</a></button>
                            <?php
                            else:
                            ?>
                        <form action="addcart.php" method="post">
                        <input type="hidden" name="producto_id" value="<?php echo $r->id; ?>">
                        <div>
                            <input type="number" name="cant" value="1" style="width:100px;" min="1" placeholder="Cantidad">
                            <button type="submit">Agregar al carrito</button>
                        </div>
                        </form>
                            <?php  endif; ?>
                    </td>
                        </tr>
                        
                    <?php endwhile; ?>
                    </table>
                    <br><br><hr>
            </div>
        </div>
    </div>


</body>
</html>