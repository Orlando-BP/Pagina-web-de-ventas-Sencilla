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
  //administradores_lista.php
  require "../funciones/conecta.php";
  $con = conecta();

  $sql = "SELECT * FROM productos WHERE estatus = 1 AND eliminado = 0";
  //echo $sql;
  $res = $con->query($sql);
  ?>

  <html>
    <header>
      <title>Productos</title>
      <script src="..\jquery-3.3.1.min.js"></script>
      <script src="ProductosScript.js?v=<?php echo(rand()); ?>"></script>
      <link rel="stylesheet" type="text/css" href="..\estilo.css?v=<?php echo time(); ?>">
    </header>

    <body>
    <?php 
      include("MenuProductos.php");
    ?>
    
      <center><div  class="Tabla">
        <div class="Cabecera">
          <div class="Fila" id="Titulo"><h1>Listado de Productos</h1></div>
        </div>
        <div class="Cabecera">
          <div class="Fila" id="Titulo"><a href="AgregarProducto.php"> Agregar Producto </a></div>
        </div>
        <div class="Registro">
          <div class="Fila" id="Menu">Codigo</div>
          <div class="Fila" id="Menu">Nombre</div>
          <div class="Fila" id="Menu">Costo</div>
          <div class="Fila" id="Menu">Stock</div>
          <div class="Fila" id="Menu">Ver Detalle</div>
          <div class="Fila" id="Menu">Editar</div>
          <div class="Fila" id="Menu">Eliminar</div>
        </div>
    <?php
      while($row = $res->fetch_array())
      {
        $id         = $row["id"];
        $codigo         = $row["codigo"];
        $nombre     = $row["nombre"];
        $costo     = $row["costo"];
        $stock     = $row["stock"];

        echo "<div class=\"Registro\" id=\"fila_$id\">";
        echo "<div class=\"Fila\">$codigo</div>";
        echo "<div class=\"Fila\">$nombre </div>";
        echo "<div class=\"Fila\">$costo\$</div>";
        echo "<div class=\"Fila\">$stock</div>";
        echo "<div class=\"Fila\"><a href=\"DetalleProducto.php?id=$id\"> .-Ver Detalle-. </a></div>";
        echo "<div class=\"Fila\"><a href=\"EditarProducto.php?id=$id\"> .-Editar-. </a></div>";
        echo "<div class=\"Fila\"><a href=\"javascript:void(0);\" onclick=\"eliminaFilasProducto($id);\"> .-Eliminar-. </a></div>";
        echo "</div>";
      }

    ?>
      </div></center>
    </body>
  </html>

  
