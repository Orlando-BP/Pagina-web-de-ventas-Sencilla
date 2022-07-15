<?php
session_start();
require "funciones/conecta.php";
$con = conecta();
$receptor = "yubelbp@gmail.com";
$correo = "From:".$_POST['correo'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$ban = 0;
if(mail($receptor,$asunto,$mensaje,$correo )){
    $ban = 1;
}
echo $ban;
 ?>