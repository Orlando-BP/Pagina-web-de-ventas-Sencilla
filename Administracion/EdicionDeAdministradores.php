<?php
//alert("XD");
require "funciones/conecta.php";
$con = conecta();
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];

$imagen  = $_FILES['archivo'];
$file_name  = $imagen['name'];     //nombre del archivo
$file_tmp   = $imagen['tmp_name']; //nombre temporal


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

$ban = 0;
$sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', rol = '$rol'";
if($pass != ""){
    $passEnc   =md5($pass);
    $sql .= ", pass = '$passEnc' ";
}
if($file_name !=""){
  $file_enc   = md5_file($file_tmp);
  $cadena     = explode(".", $file_name);       //separa el nombre
  $ext        = $cadena[1];                     //extencion
  $dir        = "archivos/";                    //carpeta donde guarda
  $nuevoNombre = "$file_enc.$ext";  
  $sql .= ",nombreFoto = '$file_name', nombreFotoEnc = '$nuevoNombre' ";
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
