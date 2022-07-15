<?php
//alert("XD");
require "../funciones/conecta.php";
$con = conecta();



$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];

$imagen  = $_FILES['archivo'];
$file_name  = $imagen['name'];     //nombre del archivo
$file_tmp   = $imagen['tmp_name']; //nombre temporal
$file_enc   = md5_file($file_tmp);
$cadena     = explode(".", $file_name);       //separa el nombre
$ext        = $cadena[1];                     //extencion
$dir        = "imagenProductos/";                    //carpeta donde guarda
$nuevoNombre = "$file_enc.$ext";

$costo = $_POST['costo'];
$stock = $_POST['stock'];
$descripcion = $_POST['descripcion'];

$ban = 0;

$sql = "INSERT INTO productos (nombre,codigo,descripcion,costo,stock,archivo_n,archivo) VALUES('$nombre','$codigo','$descripcion','$costo','$stock','$file_name','$nuevoNombre')";
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
