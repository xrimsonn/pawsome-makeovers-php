<?php
//Aquí los datos del infinity:
//$host="sql113.infinityfree.com";
//$user="if0_34361735";
//$pwd="0vavs74w39oUiQ";
//$bd="if0_34361735_crudphp";

//Datos del localhost
$host="localhost";
$user="root";
$pwd="";
$bd="pawsome_makeovers_a";

$mysqli=new mysqli($host,$user,$pwd,$bd);

if($mysqli->connect_error){
  die("Fallo la conexión".$mysqli->connect_error);
}
?>