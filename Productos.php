<?php
  require "./funciones/conecta.php";
  $con = conecta();

  $sql1 = "SELECT * FROM productos WHERE estatus = 1 AND eliminado = 0  ORDER by rand()";
  $res1 = $con->query($sql1);
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
    <h1 class="titulos">Productos</h1>
    <div class="ContenedorProductos">
        
    <?php
      while($row1 = $res1->fetch_array())
      {
        $id         = $row1["id"];
        $nombre     = $row1["nombre"];
        $costo     = $row1["costo"];
        $archivo  = $row1["archivo"];
        echo "<div class=\"producto\">";
        ?>
            <form name="form<?php echo($id); ?>" id="form<?php echo($id); ?>"  onsubmit="agregarProductoCarro();">
            <img class="ImagenProducto" src="Administracion\productos\imagenProductos\<?php echo($archivo); ?>">
    <?php   echo "<a href=\"DetalleProducto.php?id=$id\"> <p>$nombre</p> </a>";
            echo "<p>$costo$</p>";
            echo "<input class=\"cantidad\" type=\"text\" name=\"cantidad$id\" id=\"cantidad$id\" value=\"1\"><br>";
            ?>
            <input type="submit" value="Agregar al carrito" onclick="agregarProductoCarro(<?php echo($id) ?>); return false">
            </form>
            <?php
            echo "</div>";
      }
    ?>
    </div>
</body>
    <footer>
        <center><div class="PiePagina"><b>Derechos Reservados | Términos y Condiciones | Redes Sociales</b></div></center>
    </footer>
  </html>
