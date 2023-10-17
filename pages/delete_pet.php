<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header("Location: ./login.php");
  exit();
}

include "../config.php";

if (isset($_GET['id'])) {
  $idMascota = $_GET['id'];

  // Realiza la eliminación de la mascota en la base de datos
  $sql = "DELETE FROM mascotas WHERE id_mascota = $idMascota";
  if ($mysqli->query($sql)) {
    // Redirige de nuevo a la página de lista de mascotas
    header("Location: ./pets.php");
    exit();
  } else {
    echo "Error";
  }
} else {
  echo "ID no found.";
}
?>
