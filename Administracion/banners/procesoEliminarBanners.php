<?php
session_start();

if($_SESSION['nombre'] == null)
{
    header("Location:index.php");
}
?>
<?php
require "../funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];
$ban = 0;

if($id > 0)
  {
    $sql ="UPDATE banners SET eliminado = 1 WHERE id = $id";
    $res = $con->query($sql);
    $ban = 1;
  }
echo $ban;
 ?>