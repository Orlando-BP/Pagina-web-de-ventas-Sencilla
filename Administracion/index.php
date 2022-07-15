<?php 
session_start();
if(isset($_SESSION['nombre']))
{
    header("Location:Bienvenido.php");
}
?>

<html>
    <head>
        <title>Login</title>
        <script src="jquery-3.3.1.min.js"></script>
        <script src="scripts.js?v=<?php echo(rand()); ?>"></script>
        <script src="validaDatos.js?v=<?php echo(rand()); ?>"></script>
        <link rel="stylesheet" type="text/css" href="estilo.css?v=<?php echo time(); ?>">
        
    </head>

    <body>
    
        <center>
            <font size="20" color="blue">Bienvenido</font><br><br>

            <form name="form01"  onsubmit="validaDatosSesion();">
                <input type="email" name="correo" id="correo" placeholder="Correo">
                <input type="password"  name="pass" id="pass" placeholder="Password"><br>
                <br>
                <div id="mensaje1" class="error"></div>
                <input type="submit" value="Enviar" onclick="validaDatosSesion(); return false">  
            </form>
        </center>

    </body>
</html>