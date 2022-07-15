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

  $sql = "SELECT * FROM banners WHERE estatus = 1 AND eliminado = 0";
  //echo $sql;
  $res = $con->query($sql);
  ?>

  <html>
    <header>
      <title>Banners</title>
      <script src="..\jquery-3.3.1.min.js"></script>
      <script src="BannersScript.js?v=<?php echo(rand()); ?>"></script>
      <link rel="stylesheet" type="text/css" href="..\estilo.css?v=<?php echo time(); ?>">
    </header>

    <body>
    <?php 
      include("MenuBanners.php");
    ?>
    
      <center><div  class="Tabla">
        <div class="Cabecera">
          <div class="Fila" id="Titulo"><h1>Listado de Banners</h1></div>
        </div>
        <div class="Cabecera">
          <div class="Fila" id="Titulo"><a href="AgregarBanners.php"> Agregar Banner </a></div>
        </div>
        <div class="Registro">
          <div class="Fila" id="Menu">Id</div>
          <div class="Fila" id="Menu">Nombre</div>
          <div class="Fila" id="Menu">Banner</div>
          <div class="Fila" id="Menu">Ver Detalle</div>
          <div class="Fila" id="Menu">Editar</div>
          <div class="Fila" id="Menu">Eliminar</div>
        </div>
    <?php
      while($row = $res->fetch_array())
      {
        $id         = $row["id"];
        $nombre     = $row["nombre"];
        $banner     = $row["archivo"];

        echo "<div class=\"Registro\" id=\"fila_$id\">";
        echo "<div class=\"Fila\">$id</div>";
        echo "<div class=\"Fila\">$nombre </div>";
        ?>
        <div class="Fila" id="Fila"><img class="FotoBannerTiny" src="imagenBanners\<?php echo($banner); ?>" alt="<?php $nombre?>"></div>
        <?php
        echo "<div class=\"Fila\"><a href=\"DetalleBanners.php?id=$id\"> .-Ver Detalle-. </a></div>";
        echo "<div class=\"Fila\"><a href=\"EditarBanners.php?id=$id\"> .-Editar-. </a></div>";
        echo "<div class=\"Fila\"><a href=\"javascript:void(0);\" onclick=\"eliminaFilasBanners($id);\"> .-Eliminar-. </a></div>";
        echo "</div>";
      }

    ?>
      </div></center>
    </body>
  </html>

  
