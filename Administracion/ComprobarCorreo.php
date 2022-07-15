<?php
require "funciones/conecta.php";
$con = conecta();
$correo = $_REQUEST['correo'];
$id = $_REQUEST['id'];
$ban = 0;

$sql = "SELECT correo FROM administradores WHERE correo = '$correo' AND eliminado = 0 AND id != $id";

$res = $con->query($sql);

$row = $res->fetch_array();

if($row != 0)
{
    $ban=1;
}

echo $ban;
 ?>