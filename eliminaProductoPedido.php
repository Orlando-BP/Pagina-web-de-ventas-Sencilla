<?php
session_start();
?>
<?php
require "funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];
$ban = 0;

if($id > 0)
  {
    $sql ="DELETE FROM detallepedido WHERE idproducto = $id";
    $res = $con->query($sql);
    $ban = 1;
  }
echo $ban;
 ?>