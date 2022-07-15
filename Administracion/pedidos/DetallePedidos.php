<?php
session_start();

if($_SESSION['nombre'] == null)
{
    header("Location:..\index.php");
}
?>
<?php
require "../funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];

$sql = "SELECT * FROM detallepedido WHERE idpedido = $id";
$res = $con->query($sql);

?>
<html>
    <header>
      <title>Detalle producto</title>
      <script src="..\jquery-3.3.1.min.js"></script>
      <script src="ProductosScript.js?v=<?php echo(rand()); ?>"></script>
      <link rel="stylesheet" type="text/css" href="..\estilo.css?v=<?php echo time(); ?>">
    </header>

    <body>
    <?php 
      include("MenuPedidos.php");
    ?>
    <center>
    <form method="get" action="ListarPedidos.php">
                <button type="submit">regresar</button>
            </form>
    <h3 class="titulos">Pedido#<?php echo($id); ?></h3><br>
    
    <div class="DetallePedido">
        
        <div class="Renglon">
            <div class="columnas">
            <b>Producto</b>
            </div>
            <div class="columnas">
            <b>Cantidad</b>
            </div>
            <div class="columnas">
            <b>Costo Unitario</b>
            </div>
            <div class="columnas">
            <b>Subtotal</b>
            </div>
        </div>
        <?php
        $total = 0;
      while($row = $res->fetch_array())
      {
        
        $idproducto         = $row["idproducto"];
        $sql2 = "SELECT * FROM productos WHERE id = $idproducto";
        $res2 = $con->query($sql2);
        $row2 = $res2->fetch_array();
        $nombreproducto = $row2["nombre"];
        $costo     = $row["costo"];
        $cantidad  = $row["cantidad"];
        $subtotal = $costo * $cantidad;
        $total = $total + $subtotal;
        echo" <div class=\"Renglon\" id=\"fila_$idproducto\"> ";
        echo"<div class=\"columnas\">";
        echo"<b>$nombreproducto</b>";
        echo"</div>";
        echo"<div class=\"columnas\">";
        echo"<b>$cantidad</b>";
        echo"</div>";
        echo"<div class=\"columnas\">";
        echo"<b>$costo</b>";
        echo"</div>";
        echo"<div class=\"columnas\">";
        echo"<b>$subtotal</b>";
        echo"</div>";
        echo"</div>";
      }
      ?>
      

    </div>
    <h3 class="titulos">Total de Pedido: <?php echo($total); ?></h3><br>
    </body>
  </html>