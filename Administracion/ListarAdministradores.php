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
      <title>Administradores</title>
      <script src="jquery-3.3.1.min.js"></script>
      <script src="scripts.js?v=<?php echo(rand()); ?>"></script>
      <link rel="stylesheet" type="text/css" href="estilo.css?v=<?php echo time(); ?>">
    </header>

    <body>
    <?php 
      include("menu.php");
    ?>
    
      <center><div  class="Tabla">
        <div class="Cabecera">
          <div class="Fila" id="Titulo"><h1>Listado de Administradores</h1></div>
        </div>
        <div class="Cabecera">
          <div class="Fila" id="Titulo"><a href="administradores_inserta.php"> Nuevo Administrador </a></div>
        </div>
        <div class="Registro">
          <div class="Fila" id="Menu">Id</div>
          <div class="Fila" id="Menu">Nombre</div>
          <div class="Fila" id="Menu">Correo</div>
          <div class="Fila" id="Menu">Rol</div>
          <div class="Fila" id="Menu">Eliminar</div>
          <div class="Fila" id="Menu">Ver Detalle</div>
          <div class="Fila" id="Menu">editar</div>
        </div>
    <?php
      while($row = $res->fetch_array())
      {
        $id         = $row["id"];
        $nombre     = $row["nombre"];
        $apellidos     = $row["apellidos"];
        $correo     = $row["correo"];
        $rol        = $row["rol"];

        echo "<div class=\"Registro\" id=\"fila_$id\">";
        echo "<div class=\"Fila\">$id</div>";
        echo "<div class=\"Fila\">$nombre $apellidos</div>";
        echo "<div class=\"Fila\">$correo</div>";
        echo "<div class=\"Fila\">$rol</div>";
        echo "<div class=\"Fila\"><a href=\"javascript:void(0);\" onclick=\"eliminaFilas($id);\"> .-Eliminar-. </a></div>";
        echo "<div class=\"Fila\"><a href=\"administradores_detalle.php?id=$id\"> .-Ver Detalle-. </a></div>";
        echo "<div class=\"Fila\"><a href=\"administradores_editar.php?id=$id\"> .-Editar-. </a></div>";
        echo "</div>";
      }

    ?>
      </div></center>
    </body>
  </html>

  
