<?php
//alert("XD");
require "funciones/conecta.php";
$con = conecta();



$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$imagen  = $_FILES['archivo'];
$file_name  = $imagen['name'];     //nombre del archivo
$file_tmp   = $imagen['tmp_name']; //nombre temporal
$file_enc   = md5_file($file_tmp);
$cadena     = explode(".", $file_name);       //separa el nombre
$ext        = $cadena[1];                     //extencion
$dir        = "archivos/";                    //carpeta donde guarda
$nuevoNombre = "$file_enc.$ext";
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$estatus = $_POST['rol'];
$rol = '';
if($estatus == 1){
  $rol = "Gerente";
}
else{
  $rol = "Ejecutivo";
}
$passEnc   =md5($pass);
$ban = 0;
//editar query
$sql = "INSERT INTO administradores (nombre,apellidos,correo,pass,rol,nombreFoto,nombreFotoEnc) VALUES('$nombre','$apellidos','$correo','$passEnc','$rol','$file_name','$nuevoNombre')";
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
