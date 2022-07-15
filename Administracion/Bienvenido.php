<?php
session_start();

if($_SESSION['nombre'] == null)
{
    header("Location:index.php");
}
$nombre= $_SESSION['nombre'];
$idU = $_SESSION['idU'];
?>
<?php
  //administradores_lista.php
  require "./funciones/conecta.php";
  $con = conecta();

  $sql = "SELECT * FROM administradores WHERE estatus = 1 AND eliminado = 0";
  //echo $sql;
  $res = $con->query($sql);
  ?>

  <html>
    <header>
      <title>Listar</title>
      <script src="jquery-3.3.1.min.js"></script>
      <script src="scripts.js?v=<?php echo(rand()); ?>"></script>
      <link rel="stylesheet" type="text/css" href="estilo.css?v=<?php echo time(); ?>">
    </header>
    <body>
    <center><div  class="Tabla">
    <div class="Cabecera">
          <div class="Fila" id="Titulo"><h1>Bienvenido <?php echo $nombre;?></h1></div>
        </div>
      <div class="Registro">
          <div class="Fila" id="Menu"><a href="Bienvenido.php"> Inicio </a></div>
          <div class="Fila" id="Menu"><a href="ListarAdministradores.php"> Administradores </a></div>
          <div class="Fila" id="Menu"><a href="productos\ListadoProductos.php"> Productos </a></div>
          <div class="Fila" id="Menu"><a href="banners\ListadoBanners.php"> Banners </a></div>
          <div class="Fila" id="Menu"><a href="pedidos\ListarPedidos.php"> Pedidos </a></div>
          <div class="Fila" id="Menu"><a href="CerrarSesion.php"> Cerrar Sesion </a></div>
      </div>
    </div></center>
    
    </body>
  </html>

  
