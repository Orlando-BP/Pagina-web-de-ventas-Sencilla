<?php
session_start();

if($_SESSION['nombre'] == null)
{
    header("Location:..\index.php");
}
?>
<html>
    <head>
        <title>Alta de Banner</title>
        <script src="..\jquery-3.3.1.min.js"></script>
        <script src="BannersScript.js?v=<?php echo(rand()); ?>"></script>
        <link rel="stylesheet" type="text/css" href="..\estilo.css?v=<?php echo time(); ?>">
        
    </head>

    <body>
        
        <center>
            <font size="20" color="blue">Alta de Banners</font><br><br>

            <form name="form01" id="form01"  onsubmit="validaDatosBanners();">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br>
                <input type="file" id="archivo" name="archivo"><br>
                <input type="submit" value="Salvar" onclick="validaDatosBanners(); return false"><div id="mensaje2" class="error"></div><br>

                
            </form>
            <div class="celda" id="encabezado">
            <form method="get" action="ListadoBanners.php">
                <button type="submit">regresar</button>
            </form>
            </div>
        </center>

    </body>
</html>
