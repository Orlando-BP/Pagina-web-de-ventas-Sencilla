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

$Id = $row["id"];
$codigo = $row["codigo"];
$nombre = $row['nombre'];
$descripcion = $row['descripcion'];
$costo = $row['costo'];
$stock = $row['stock'];
?>
<html>
    <head>
        <title>Editar Producto</title>
        <script src="..\jquery-3.3.1.min.js"></script>
        <script src="ProductosScript.js?v=<?php echo(rand()); ?>"></script>
        <link rel="stylesheet" type="text/css" href="..\estilo.css?v=<?php echo time(); ?>">
        
    </head>

    <body>
    <?php 
      include("MenuProductos.php");
    ?>
        <center>
            <font size="20" color="blue">Editar Producto</font><br><br>

            <form name="form01" id="form01"  onsubmit="validaDatosProductos();">
                <input type="text" name="codigo" id="codigo" placeholder="codigo" value="<?php echo($codigo) ?>"  onfocus="limpiaCampo();" onblur="validaCodigo(<?php echo($Id) ?>);">
                <div id="mensaje1" class="error"></div>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo($nombre) ?>"><br>
                <input type="text" name="descripcion" id="descripcion" placeholder="descripcion" value="<?php echo($descripcion) ?>"><br>
                <input type="text" name="costo" id="costo" placeholder="costo" value="<?php echo($costo) ?>"><br>
                <input type="text" name="stock" id="stock" placeholder="stock" value="<?php echo($stock) ?>"><br>
                <input type="file" id="archivo" name="archivo"><br>
                <input type="hidden" name="id" id="id"  value="<?php echo($Id) ?>"><br>
                
                <input type="submit" value="Salvar" onclick="validaDatosProductosEditar(); return false"><div id="mensaje2" class="error"></div><br>

                
            </form>
            <div class="celda" id="encabezado">
            <form method="get" action="ListadoProductos.php">
                <button type="submit">regresar</button>
            </form>
            </div>
        </center>

    </body>
</html>