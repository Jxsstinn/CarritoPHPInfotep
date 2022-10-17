<?php 
session_start();
if(!empty($_POST))
{
    if(isset($_POST["producto_id"]) && isset($_POST["cant"]))
    {
        if(empty($_SESSION["cart"]))
        {
            $_SESSION['cart']=array(array("producto_id"=>$_POST["producto_id"],"cant"=>$_POST["cant"]));
        }

        else
        {
                $cart = $_SESSION["cart"];
                $repeated = false;
                foreach ($cart as $c)
                {
                    if($c["producto_id"]==$_POST["producto_id"])
                    {
                        $repeated = true;
                        break;
                    }
                }
                if($repeated)
                {
                    print "<script> alert('Error: Producto repetido'); </script> ";
                }
                else
                {
                    array_push($cart, array("producto_id"=>$_POST["producto_id"],"cant"=>$_POST["cant"]));
                    $_SESSION["cart"] = $cart;
                }
                print "<script> window.location='productos.php'; </script> ";
        }
    }
}
?>