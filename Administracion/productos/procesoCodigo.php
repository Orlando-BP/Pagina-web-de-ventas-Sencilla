<?php
require "../funciones/conecta.php";
$con = conecta();
$codigo = $_REQUEST['codigo'];
$id = $_REQUEST['id'];
$ban = 0;

$sql = "SELECT codigo FROM productos WHERE codigo = '$codigo' AND eliminado = 0 AND id != $id";

$res = $con->query($sql);

$row = $res->fetch_array();

if($row != 0)
{
    $ban=1;
}

echo $ban;
 ?>