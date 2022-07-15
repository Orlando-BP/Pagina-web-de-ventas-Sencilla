<?php
session_start();

if($_SESSION['nombre'] == null)
{
    header("Location:index.php");
}
?>
<?php
require "./funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];

$sql = "SELECT * FROM administradores WHERE id = $id";
$res = $con->query($sql);
$row = $res->fetch_assoc();

$id = $row["id"];
$nombre = $row['nombre'];
$apellidos = $row['apellidos'];
$nombreFoto = $row['nombreFoto'];
$Archivo = $row['nombreFotoEnc'];
$correo = $row['correo'];
$rol = $row['rol'];
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
      <title>Detalle</title>
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
          <div class="Fila" id="Titulo"><h1>Detalle de Administrador</h1></div>
        </div>
        <div class="Cabecera">
          <div class="Fila" id="Titulo">
            <form method="get" action="ListarAdministradores.php">
                <button type="submit">regresar</button>
            </form>
          </div>
        </div>
        <div class="Registro">
          <div class="Fila" id="Menu">Id</div>
          <div class="Fila" id="Menu">Nombre</div>
          <div class="Fila" id="Menu">Correo</div>
          <div class="Fila" id="Menu">Rol</div>
          <div class="Fila" id="Menu">Estatus</div>
          <div class="Fila" id="Menu">Foto</div>
        </div>
    <?php
        echo "<div class=\"Registro\" id=\"fila_$id\">";
        echo "<div class=\"Fila\">$id</div>";
        echo "<div class=\"Fila\">$nombre $apellidos</div>";
        echo "<div class=\"Fila\">$correo</div>";
        echo "<div class=\"Fila\">$rol</div>";
        echo "<div class=\"Fila\">$Estatus</div>"; 
        
    ?>
      <div class="Fila" id="Fila"><img class="FotoUsuario" src="archivos\<?php echo($Archivo); ?>" alt="<?php $nombreFoto?>"></div>
      </div>
    </div></center>
    </body>
  </html>