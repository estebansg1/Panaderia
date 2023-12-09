<?php
 function conectar(){

$user="root";
$pass="";
$server="localhost";
$db="ventas";
$con=mysqli_connect($server,$user,$pass) or die ("Error al conectar a la base de datos".mysqli_error());
mysqli_select_db($db,$con);
return $con;

}
?>