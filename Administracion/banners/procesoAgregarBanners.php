<?php
//alert("XD");
require "../funciones/conecta.php";
$con = conecta();



$nombre = $_POST['nombre'];

$imagen  = $_FILES['archivo'];
$file_name  = $imagen['name'];     //nombre del archivo
$file_tmp   = $imagen['tmp_name']; //nombre temporal
$file_enc   = md5_file($file_tmp);
$cadena     = explode(".", $file_name);       //separa el nombre
$ext        = $cadena[1];                     //extencion
$dir        = "imagenBanners/";                    //carpeta donde guarda
$nuevoNombre = "$file_enc.$ext";

$ban = 0;

$sql = "INSERT INTO banners (nombre,archivo) VALUES('$nombre','$nuevoNombre')";
$res = $con->query($sql);
if($res)
  {
    if($file_name != '')
    {
      copy($file_tmp, $dir.$nuevoNombre);
    }
    $ban = 1;
  }
echo $ban;
 ?>
