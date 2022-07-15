<?php
session_start();

if($_SESSION['nombre'] == null)
{
    header("Location:..\index.php");
}
$nombre= $_SESSION['nombre'];
$idU = $_SESSION['idU'];
?>
<?php
  require "../funciones/conecta.php";
  $con = conecta();

  $sql = "SELECT * FROM pedidos WHERE estado = 1";
  $res = $con->query($sql);
  ?>

  <html>
    <header>
      <title>Pedidos</title>
      <script src="jquery-3.3.1.min.js"></script>
      <script src="..\scripts.js?v=<?php echo(rand()); ?>"></script>
      <link rel="stylesheet" type="text/css" href="..\estilo.css?v=<?php echo time(); ?>">
    </header>

    <body>
    <?php 
      include("MenuPedidos.php");
    ?>
    
      <center><div  class="Tabla">
        <div class="Cabecera">
          <div class="Fila" id="Titulo"><h1>Listado de pedidos</h1></div>
        </div>
        <div class="Registro">
          <div class="Fila" id="Menu">Id</div>
          <div class="Fila" id="Menu">Fecha</div>
          <div class="Fila" id="Menu">Ver Detalle</div>
        </div>
    <?php
      while($row = $res->fetch_array())
      {
        $id         = $row["id"];
        $fecha     = $row["fecha"];

        echo "<div class=\"Registro\" id=\"fila_$id\">";
        echo "<div class=\"Fila\">$id</div>";
        echo "<div class=\"Fila\">$fecha</div>";
        echo "<div class=\"Fila\"><a href=\"DetallePedidos.php?id=$id\"> .-Ver Detalle-. </a></div>";
        echo "</div>";
      }

    ?>
      </div></center>
    </body>
  </html>

  
