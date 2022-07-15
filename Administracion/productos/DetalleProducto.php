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

$sql = "SELECT * FROM productos WHERE id = $id";
$res = $con->query($sql);
$row = $res->fetch_assoc();

$id = $row["id"];
$nombre = $row['nombre'];
$codigo = $row['codigo'];
$descripcion = $row['descripcion'];
$costo = $row['costo'];
$stock = $row['stock'];
$nombreFoto = $row['archivo_n'];
$archivo = $row['archivo'];
$estatus = $row['estatus'];
$Estatus = "";
if($estatus == 1){
    $Estatus = "Activo";
}
else{
    $Estatus = "Inactivo";
}
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
      include("MenuProductos.php");
    ?>
    <center><div  class="Tabla">
        <div class="Cabecera">
          <div class="Fila" id="Titulo"><h1>Detalle de Producto</h1></div>
        </div>
        <div class="Cabecera">
          <div class="Fila" id="Titulo">
            <form method="get" action="ListadoProductos.php">
                <button type="submit">regresar</button>
            </form>
          </div>
        </div>
        <div class="Registro">
          <div class="Fila" id="Menu">Codigo</div>
          <div class="Fila" id="Menu">Nombre</div>
          <div class="Fila" id="Menu">Descripcion</div>
          <div class="Fila" id="Menu">Costo</div>
          <div class="Fila" id="Menu">Stock</div>
          <div class="Fila" id="Menu">Estatus</div>
          <div class="Fila" id="Menu">Foto</div>
        </div>
    <?php
        echo "<div class=\"Registro\" id=\"fila_$id\">";
        echo "<div class=\"Fila\">$codigo</div>";
        echo "<div class=\"Fila\">$nombre </div>";
        echo "<div class=\"Fila\">$descripcion</div>";
        echo "<div class=\"Fila\">$costo</div>";
        echo "<div class=\"Fila\">$stock</div>";
        echo "<div class=\"Fila\">$Estatus</div>"; 
        
    ?>
      <div class="Fila" id="Fila"><img class="FotoProducto" src="imagenProductos\<?php echo($archivo); ?>" alt="<?php $nombreFoto?>"></div>
      </div>
    </div></center>
    </body>
  </html>