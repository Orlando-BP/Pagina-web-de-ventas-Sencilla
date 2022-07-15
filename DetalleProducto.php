<?php
session_start();
  require "./funciones/conecta.php";
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
      <title>Productos</title>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
      <script src="funciones/jquery-3.3.1.min.js"></script>
      <script src="scripts.js?v=<?php echo(rand()); ?>"></script>
      <link rel="stylesheet" type="text/css" href="estilo.css?v=<?php echo time(); ?>">
    </header>
    <body>
    <?php 
      include("Menu.php");
    ?>
    <h1 class="titulos">Nombre de Producto: <?php echo($nombre); ?></h1>
    <div class="Detalle">
    <div class="Renglon">
            <div class="DatoTitulo">
            <b>Foto:</b>
            </div>
            <div class="Dato">
            <img class="FotoProducto" src="Administracion\productos\imagenProductos\<?php echo($archivo); ?>">
            </div>
        </div>
        <div class="Renglon">
            <div class="DatoTitulo">
            <b>Descripcion:</b>
            </div>
            <div class="Dato">
            <b><?php echo($descripcion); ?></b>
            </div>
        </div>
        <div class="Renglon">
            <div class="DatoTitulo">
            <b>Costo:</b>
            </div>
            <div class="Dato">
            <b><?php echo($costo); ?>$</b>
            </div>
        </div>
        <div class="Renglon">
            <div class="DatoTitulo">
            <b>Stock:</b>
            </div>
            <div class="Dato">
            <b><?php echo($stock); ?></b>
            </div>
        </div>
        <div class="Renglon">
            <div class="DatoTitulo">
            <b>Codigo:</b>
            </div>
            <div class="Dato">
            <b><?php echo($codigo); ?></b>
            </div>
        </div>
        <div class="Renglon">
            <div class="DatoTitulo">
            <b>Estatus:</b>
            </div>
            <div class="Dato">
            <b><?php echo($Estatus); ?></b>
            </div>
        </div>
    </div>
    <center>
        <form name="form<?php echo($id); ?>" id="form<?php echo($id); ?>"  onsubmit="agregarProductoCarro();">
            <b>Cantidad:</b>
            <?php  
            echo "<input class=\"cantidad2\" type=\"text\" name=\"cantidad$id\" id=\"cantidad$id\" value=\"1\">";
            ?>
            <input type="submit" value="Agregar al carrito" onclick="agregarProductoCarro(<?php echo($id) ?>); return false">
            </form>
</center>
</body>
    <footer>
        <center><div class="PiePagina"><b>Derechos Reservados | Términos y Condiciones | Redes Sociales</b></div></center>
    </footer>
  </html>
