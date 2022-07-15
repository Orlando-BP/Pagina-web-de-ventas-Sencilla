<?php
session_start();

if($_SESSION['idpedido'] == null)
{
    header("Location:CarritoF.php");
}
$idpedido= $_SESSION['idpedido'];
?>
<?php

  require "./funciones/conecta.php";
  $con = conecta();

  $sql = "SELECT * FROM detallepedido WHERE idpedido = $idpedido";
  $res = $con->query($sql);


  ?>

  <html>
    <header>
      <title>Home</title>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
      <script src="funciones/jquery-3.3.1.min.js"></script>
      <script src="scripts.js?v=<?php echo(rand()); ?>"></script>
      <link rel="stylesheet" type="text/css" href="estilo.css?v=<?php echo time(); ?>">
    </header>
    <body >
    <?php 
      include("Menu.php");
    ?>
    <div class="wrapper">
    <center>
    <h3 class="titulos">Pedido#<?php echo($idpedido); ?></h3><br>
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
            <div class="columnas">
            <b>--------</b>
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
        echo"<div class=\"columnas\">";
        echo"<b><a href=\"javascript:void(0);\" onclick=\"eliminarProductos($idproducto); \"> .-Eliminar-. </a></b>";
        echo"</div>";
        echo"</div>";
      }
      ?>
      

    </div>
    <h3 class="titulos">Total de Pedido: <?php echo($total); ?></h3><br>
<button type="button" onClick="EnviarPedido(<?php echo($idpedido); ?>)">Enviar Pedido</button>
</center>
</div>
</body>
    <footer>
        <center><div class="PiePagina"><b>Derechos Reservados | Términos y Condiciones | Redes Sociales</b></div></center>
    </footer>
  </html>

  
