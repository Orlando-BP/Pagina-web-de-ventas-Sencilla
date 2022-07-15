<?php
session_start();

$idpedido= $_SESSION['idpedido'];
?>
<?php
require "funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];
$ban = 0;

if($id > 0)
  {
    $sql ="UPDATE pedidos SET estado = 1 where id = $idpedido";
    $res = $con->query($sql);
    session_destroy();
    $ban = 1;
  }
echo $ban;
 ?>