<?php
session_start();

if($_SESSION['nombre'] == null)
{
    header("Location:..\index.php");
}
?>
<html>
    <head>
        <title>Alta de Producto</title>
        <script src="..\jquery-3.3.1.min.js"></script>
        <script src="ProductosScript.js?v=<?php echo(rand()); ?>"></script>
        <link rel="stylesheet" type="text/css" href="..\estilo.css?v=<?php echo time(); ?>">
        
    </head>

    <body>
    <?php 
      include("MenuProductos.php");
    ?>
        <center>
            <font size="20" color="blue">Alta de Productos</font><br><br>

            <form name="form01" id="form01"  onsubmit="validaDatosProductos();">
                <input type="text" name="codigo" id="codigo" placeholder="codigo"  onfocus="limpiaCampo();" onblur="validaCodigo(0);">
                <div id="mensaje1" class="error"></div>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br>
                <input type="text" name="descripcion" id="descripcion" placeholder="descripcion"><br>
                <input type="text" name="costo" id="costo" placeholder="costo"><br>
                <input type="text" name="stock" id="stock" placeholder="stock"><br>
                <input type="file" id="archivo" name="archivo"><br>
                
                
                <input type="submit" value="Salvar" onclick="validaDatosProductos(); return false"><div id="mensaje2" class="error"></div><br>

                
            </form>
            <div class="celda" id="encabezado">
            <form method="get" action="ListadoProductos.php">
                <button type="submit">regresar</button>
            </form>
            </div>
        </center>

    </body>
</html>
