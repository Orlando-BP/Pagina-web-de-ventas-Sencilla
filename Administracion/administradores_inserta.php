<?php
session_start();

if($_SESSION['nombre'] == null)
{
    header("Location:index.php");
}
?>
<html>
    <head>
        <title>Alta de Administradores</title>
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
            <font size="20" color="blue">Alta de Administradores</font><br><br>

            <form name="form01" id="form01"  onsubmit="validaDatos();">

                <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br>
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos"><br>
                <input type="file" id="archivo" name="archivo"><br>
                <input type="email" name="correo" id="correo" placeholder="Correo"  onfocus="limpiaCampo();" onblur="validaMail(0);">
                <div id="mensaje1" class="error"></div>
                
                <input type="password"  name="pass" id="pass" placeholder="Password"><br>
                <br>
                <select name="rol" id="rol">
                    <option value="0">Selecciona</option>
                    <option value="1">Gerente</option>
                    <option value="2">Ejecutivo</option>
                </select><br><br>
                <input type="submit" value="Salvar" onclick="validaDatos(); return false"><div id="mensaje2" class="error"></div><br>

                
            </form>
            <div class="celda" id="encabezado">
            <form method="get" action="ListarAdministradores.php">
                <button type="submit">regresar</button>
            </form>
            </div>
        </center>

    </body>
</html>
