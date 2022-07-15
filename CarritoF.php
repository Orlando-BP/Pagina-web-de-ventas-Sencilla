<?php
session_start();
if(isset($_SESSION['idpedido']))
{
    header("Location:CarritoT.php");
}
?>

  <html>
    <header>
      <title>Home</title>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
      <script src="funciones/jquery-3.3.1.min.js"></script>
      <script src="scripts.js?v=<?php echo(rand()); ?>"></script>
      <link rel="stylesheet" type="text/css" href="estilo.css?v=<?php echo time(); ?>">
    </header>
    <body>
    <?php 
      include("Menu.php");
    ?>
    <div class="wrapper">
    <h1 class="titulos">No hay productos en tu carrito... ve a agregar productos!!!</h1>
</div>
</body>
    <footer>
        <center><div class="PiePagina"><b>Derechos Reservados | Términos y Condiciones | Redes Sociales</b></div></center>
    </footer>
  </html>

  