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

$Id = $row["id"];
$nombre = $row['nombre'];
$apellidos = $row['apellidos'];
$correo = $row['correo'];
$rol = $row['rol'];
?>
<html>
    <head>
        <title>Edicion de Administrador</title>
        <script src="jquery-3.3.1.min.js"></script>
        <script src="scripts.js?v=<?php echo(rand()); ?>"></script>
        <script src="validaDatos.js?v=<?php echo(rand()); ?>"></script>
        <link rel="stylesheet" type="text/css" href="estilo.css?v=<?php echo time(); ?>">
        
    </head>

    <body>
    <?php 
      include("menu.php");
    ?>
        <center>
            <font size="20" color="blue">Edicion de Administrador</font><br><br>

            <form name="form01" id="form01"  onsubmit="validaDatosEdicion();">

                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo($nombre) ?>"><br>
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php echo($apellidos) ?>"><br>
                <input type="file" id="archivo" name="archivo"><br>
                <input type="email" name="correo" id="correo" placeholder="Correo" value="<?php echo($correo) ?>" onfocus="limpiaCampo();" onblur="validaMail(<?php echo($Id) ?>);">
                <div id="mensaje1" class="error"></div>
                
                <input type="password"  name="pass" id="pass" placeholder="Password"><br>
                <br>
                <select name="rol" id="rol">
                    <option value="0">Selecciona</option>
                    <?php 
                        if($rol == "Gerente"){
                            ?> 
                            <option value="1" selected>Gerente</option>
                            <option value="2">Ejecutivo</option>
                            <?php 
                        }
                        else{
                            ?> 
                            <option value="1">Gerente</option>
                            <option value="2" selected>Ejecutivo</option>
                            <?php 
                        }
                    
                    
                    ?>
                    
                </select><br><br>
                <input type="hidden" name="id" id="id"  value="<?php echo($Id) ?>"><br>
                <input type="submit" value="Salvar" onclick="validaDatosEdicion(); return false"><div id="mensaje2" class="error"></div><br>
            </form>
            <div class="celda" id="encabezado">
            <form method="get" action="ListarAdministradores.php">
                <button type="submit">regresar</button>
            </form>
            </div>
        </center>

    </body>
</html>
