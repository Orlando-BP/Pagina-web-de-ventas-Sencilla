<?php
session_start();
require "funciones/conecta.php";
$con = conecta();
if($_SESSION['idpedido'] == null)
{
    //crearpedido
    $fecha = date("d:m:Y");
    $sql = "INSERT INTO pedidos (fecha) VALUES('$fecha')";
    $res=$con->query($sql);
    $sql = "SELECT MAX(id) AS id FROM pedidos";
    $res=$con->query($sql);
    $row = $res->fetch_array();
    $_SESSION['idpedido'] = $row['id'];
}
$idpedido = $_SESSION['idpedido'];

$idproducto = $_REQUEST['id'];
$cantidad = $_REQUEST['cantidad'];

//agregar producto
$sql = "SELECT * FROM productos WHERE id = $idproducto";
$res=$con->query($sql);
$row = $res->fetch_array();
$costo = $row['costo'];

$sql = "INSERT INTO detallePedido (idpedido, idproducto, costo, cantidad) VALUES('$idpedido', '$idproducto', '$costo', '$cantidad')";
$res=$con->query($sql);
$ban = 0;
if($res)
  {
    $ban = 1;
  }
echo $ban;
 ?>