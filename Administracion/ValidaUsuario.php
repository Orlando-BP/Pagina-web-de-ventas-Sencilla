<?php
session_start();
require "funciones/conecta.php";
$con = conecta();

$user = $_REQUEST['correo'];
$pass = $_REQUEST['pass'];
$pass = md5($pass);

$sql = "SELECT * from administradores where correo='$user' and pass='$pass' and Estatus=1 and eliminado=0";

$res=$con->query($sql);
$num=$res->num_rows;
$row = $res->fetch_array();
$ban = 0;
if($num)
{
    $idU=$row['id'];
    $nombre=$row['nombre'].' '.$row['apellidos'];
    $correo=$row['correo'];
    $_SESSION['idU'] = $idU;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['correo'] = $correo;
    $ban = 1;
}
echo $ban;
 ?>