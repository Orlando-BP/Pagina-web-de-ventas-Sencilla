<?php
require "../funciones/conecta.php";
$con = conecta();
$id = $_POST['id'];
$nombre = $_POST['nombre'];

$imagen  = $_FILES['archivo'];
$file_name  = $imagen['name'];     //nombre del archivo
$file_tmp   = $imagen['tmp_name']; //nombre temporal


$ban = 0;
$sql = "UPDATE banners SET nombre = '$nombre'";

if($file_name !=""){
  $file_enc   = md5_file($file_tmp);
  $cadena     = explode(".", $file_name);       //separa el nombre
  $ext        = $cadena[1];                     //extencion
  $dir        = "imagenBanners/";                    //carpeta donde guarda
  $nuevoNombre = "$file_enc.$ext";  
  $sql .= ",archivo = '$nuevoNombre' ";
  copy($file_tmp, $dir.$nuevoNombre);
}

$sql .= " WHERE id = $id";
$res = $con->query($sql);
if($res)
  {
    $ban = 1;
  }

echo $ban;
 ?>
