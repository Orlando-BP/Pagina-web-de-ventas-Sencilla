<?php
session_start();

  require "./funciones/conecta.php";
  $con = conecta();

  $sql1 = "SELECT * FROM productos WHERE estatus = 1 AND eliminado = 0  ORDER by rand() LIMIT 3";
  $res1 = $con->query($sql1);

  $sql2 = "SELECT * FROM banners WHERE estatus = 1 AND eliminado = 0  ORDER by rand() LIMIT 1";
  $res2 = $con->query($sql2);
  $row2 = $res2->fetch_assoc();
  $banner = $row2['archivo'];
  $nombre = $row2['nombre'];

  ?>

  <html>
    <header>
      <title>Home</title>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
      <script src="funciones/jquery-3.3.1.min.js"></script>
      <script src="scripts.js?v=<?php echo(rand()); ?>"></script>
      <link rel="stylesheet" type="text/css" href="estilo.css?v=<?php echo time(); ?>">
    </header>
    <body>
    <?php 
      include("Menu.php");
    ?>
    <div class="wrapper">
    <center>
    <form name="form" id="form"  onsubmit="SendMaill();">
    <div class="Contactocontainer">
        <div class="Renglon">
            <div class="DatoTitulo">
            <b>Ingresa tu Correo:</b>
            </div>
            <div class="Dato">
            <input class="inputcontacto" type="email" name="correo" id="correo" placeholder="Correo">
            </div>
        </div>
        <div class="Renglon">
            <div class="DatoTitulo">
            <b>Ingresa tu Asunto:</b>
            </div>
            <div class="Dato">
            <input class="inputcontacto" type="text" name="asunto" id="asunto" placeholder="asunto">
            </div>
        </div>
        <div class="Renglon">
            <div class="DatoTitulo">
            <b></b>
            </div>
            <div class="Dato">
            <textarea name="mensaje" id="mensaje" rows="5" cols="45">Escribe tu comentario: </textarea>
            </div>
        </div>
    </div>
    <input type="submit" value="Enviar" onclick="SendMaill(); return false"><div id="mensaje2" class="error"></div><br>
            
    </form>
</center>
    </div>
</body>
    <footer>
        <center><div class="PiePagina"><b>Derechos Reservados | Términos y Condiciones | Redes Sociales</b></div></center>
    </footer>
  </html>