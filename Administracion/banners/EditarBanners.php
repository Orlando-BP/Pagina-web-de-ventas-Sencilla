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

$sql = "SELECT * FROM banners WHERE id = $id";
$res = $con->query($sql);
$row = $res->fetch_assoc();

$Id = $row["id"];
$nombre = $row['nombre'];
?>
<html>
    <head>
        <title>Editar Banner</title>
        <script src="..\jquery-3.3.1.min.js"></script>
        <script src="BannersScript.js?v=<?php echo(rand()); ?>"></script>
        <link rel="stylesheet" type="text/css" href="..\estilo.css?v=<?php echo time(); ?>">
        
    </head>

    <body>
    <?php 
      include("MenuBanners.php");
    ?>
        <center>
            <font size="20" color="blue">Editar Banner</font><br><br>

            <form name="form01" id="form01"  onsubmit="validaDatosBannersEditar();">
                
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo($nombre) ?>"><br>
                <input type="file" id="archivo" name="archivo"><br>
                <input type="hidden" name="id" id="id"  value="<?php echo($Id) ?>"><br>
                
                <input type="submit" value="Salvar" onclick="validaDatosBannersEditar(); return false"><div id="mensaje2" class="error"></div><br>

                
            </form>
            <div class="celda" id="encabezado">
            <form method="get" action="ListadoBanners.php">
                <button type="submit">regresar</button>
            </form>
            </div>
        </center>

    </body>
</html>