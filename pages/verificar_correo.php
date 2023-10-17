<?php
// Incluir el archivo config.php para obtener la conexión a la base de datos
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recopilar el correo enviado por la solicitud AJAX
  $correo = $_POST["correo"];

  // Verificar si el correo ya está registrado en la base de datos
  $consulta_correo = "SELECT * FROM usuarios WHERE correo = '$correo'";
  $resultado = $mysqli->query($consulta_correo);

  if ($resultado->num_rows > 0) {
    // Si el correo ya está registrado, enviamos la respuesta "1"
    echo "1";
  } else {
    // Si el correo no está registrado, enviamos la respuesta "0"
    echo "0";
  }
}

// Cerrar la conexión
$mysqli->close();
?>
