<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header("Location: ./iniciarsesion.php");
  exit();
}

include "../config.php";

if (isset($_GET['id'])) {
  $idMascota = $_GET['id'];

  // Realiza la eliminación de la mascota en la base de datos
  $sql = "DELETE FROM mascotas WHERE id_mascota = $idMascota";
  if ($mysqli->query($sql)) {
    // Redirige de nuevo a la página de lista de mascotas
    header("Location: ./mascotas.php");
    exit();
  } else {
    echo "Error al eliminar la mascota";
  }
} else {
  echo "ID de mascota no proporcionado.";
}
?>
