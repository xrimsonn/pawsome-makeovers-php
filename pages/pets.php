<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../config.php";

session_start();

$usuarioIniciadoSesion = false;
if (isset($_SESSION['usuario'])) {
  $usuarioIniciadoSesion = true;
  $correoUsuario = $_SESSION['usuario'];
  $sqlUsuario = "SELECT id_user FROM usuarios WHERE correo = '$correoUsuario'";
  $resultUsuario = $mysqli->query($sqlUsuario);

  if ($resultUsuario->num_rows == 1) {
    $rowUsuario = $resultUsuario->fetch_assoc();
    $duenno = intval($rowUsuario["id_user"]);
  }
} else {
  header("Location: ./iniciarsesion.php");
  exit();
}

if (isset($_GET['cerrar_sesion'])) {
  session_unset();
  session_destroy();
  header("Location: ./iniciarsesion.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <style>
    /* Agrega estilos personalizados */
    .table {
      border: none;
      border-radius: 10px;
    }

    .table th,
    .table td {
      border-top: none;
      border-bottom: none;
    }

    .square-image-container {
      width: 64px;
      /* El tamaño deseado para el contenedor cuadrado */
      height: 64px;
      /* El tamaño deseado para el contenedor cuadrado */
      overflow: hidden;
      /* Recorta cualquier contenido que exceda el tamaño del contenedor */
      position: relative;
      /* Establece el contexto para la imagen posicionada absolutamente */
      margin-left: 25px;
    }

    .square-image {
      width: 100%;
      /* Asegura que la imagen ocupe todo el ancho del contenedor */
      height: 100%;
      /* Asegura que la imagen ocupe todo el alto del contenedor */
      object-fit: cover;
      /* Recorta y ajusta la imagen para que cubra el contenedor */
    }

    .custom-border {
      border: 2px solid #505050;
      /* Cambia el color según tu preferencia */
      border-radius: 5px;
      /* Ajusta el valor según tu preferencia */
    }

    /* Estilo para desactivar el subrayado en hover */
    .btn-custom:hover {
      text-decoration: none;
    }
  </style>
  <title>My Pets</title>
  <link rel="shortcut icon" href="favicon.ico" type="./assets/images/huellita.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/animate.css">
  <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../assets/css/magnific-popup.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../assets/css/jquery.timepicker.css">
  <link rel="stylesheet" href="../assets/css/flaticon.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <!--Navbar start-->
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">

      <div class="row">
        <a href="./mascotas.php">
          <img src="../assets/images/boton es.png" alt="Logo" style="width: 40px" href="./welcome.php"> <!--IngléS?-->
        </a>
        <a class="navbar-brand mt-1 ml-2" href="../index.php"> Pawsome Makeovers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> Menu
        </button>

      </div>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <?php if (!$usuarioIniciadoSesion) { ?>
            <li class="nav-item active"><a href="./login.php" class="nav-link">Log In</a></li>
          <?php } else { ?>
            <li class="nav-item active"><a href="./account.php" class="nav-link">Account</a></li>
          <?php } ?>
          <li class="nav-item">
            <a href="./products.php" class="nav-link">Products</a>
          </li>
          <li class="nav-item">
            <a href="./services.php" class="nav-link">Services</a>
          </li>
          <li class="nav-item">
            <a href="./aboutus.php" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="./contactus.php" class="nav-link">Contact us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--Navbar end -->

  <section class="hero-wrap hero-wrap-2" style="background-image: url('../assets/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My Pets <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">My Pets</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light pb-5 pt-5">
    <div class="mr-5 ml-5 ftco-animate">
      <div class="block-7">
        <div class="p-4">
          <span class="text-left excerpt d-block pt-1 pb-3">
            <h3>List of my Pets</h3>
          </span>
          <ul class="text-center pricing-text mb-5">

            <?php
            $sql = "SELECT id_mascota, nombre, especie, raza, edad, genero, foto FROM mascotas WHERE duenno = $duenno";
            $resultado = $mysqli->query($sql);

            if ($resultado->num_rows > 0) {
              while ($fila = $resultado->fetch_assoc()) {
                $nombre = $fila["nombre"];
                $especie = $fila["especie"];
                $raza = $fila["raza"];
                $edad = $fila["edad"];
                $sexo = $fila["genero"];
                $foto = $fila["foto"];
                $idMascota = $fila["id_mascota"];
            ?>

                <li class="pb-1">
                  <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
                    <button href="#collapse-<?php echo $nombre; ?>" class="d-flex py-3 px-4 align-items-center justify-content-center btn" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-<?php echo $nombre; ?>">
                      <div class="row">
                        <div class="d-flex align-items-center justify-content-center overflow-hidden square-image-container custom-border">
                          <img src="data:image/jpeg;base64,<?php echo base64_encode($foto); ?>" alt="Imagen cuadrada" class="img-fluid">
                        </div>
                        <h3 class="ml-3 mt-2"><?php echo $nombre; ?><h5 class="mt-3 ml-1" style="color: rgba(0, 0, 0, 0.1) ">#<?php echo $idMascota; ?></h5>
                        </h3>
                      </div>
                      <i class="fa" aria-hidden="true"></i>
                    </button>
                  </div>
                  <div class="collapse hide" id="collapse-<?php echo $nombre; ?>" role="tabpanel" aria-labelledby="heading-<?php echo $nombre; ?>">
                    <div class="py-3 px-0">

                      <h3 class="text-left ml-5"><b>Information</b></h3>
                      <div class="row justify-content-left text-left ml-5 mr-5 mb-5">
                        <div class="col-md-3">
                          <h5><b>Species: </b><?php echo $especie; ?></h5>
                          <h5><b>Breed: </b><?php echo $raza; ?></h5>
                        </div>
                        <div class="col-md-3">
                          <h5><b>Age: </b><?php echo $edad; ?></h5>
                          <?php if ($sexo == 1) { ?>
                            <h5><b>Genre: </b>Macho</h5>
                          <?php } else { ?>
                            <h5><b>Genre: </b>Hembra</h5>
                          <?php } ?>
                        </div>
                      </div>

                      <h3 class="text-left ml-5"><b>Appointment</b></h3>
                      <div class="justify-content-center">
                        <?php
                        $sql_citas = "SELECT * FROM citas WHERE mascota = '$idMascota' AND realizada = 0";
                        $resultado_citas = $mysqli->query($sql_citas);

                        $fecha = $tipo = $descripcion = $hora = "";
                        $id_cita = 0;

                        if ($resultado_citas->num_rows > 0) {
                          while ($row = $resultado_citas->fetch_assoc()) {
                            $id_cita = $row["id_cita"];
                            $tipo = $row["tipo"];
                            $descripcion = $row["descripcion"];
                            $fecha = $row["fecha"];
                            $hora = $row["hora"];
                        ?>
                            <div class="row justify-content-center mb-5 ml-5 mr-5 text-left">
                              <div class="col-md-3">
                                <h5><b>Ticket ID: </b><?php echo $id_cita; ?></h5>
                                <h5><b>Date: </b><?php echo $fecha; ?></h5>
                              </div>
                              <div class="col-md-3">
                                <h5><b>Type: </b><?php echo $tipo; ?></h5>
                                <?php if ($hora == null) { ?>
                                  <h5><b>Time: </b>To be defined</h5>
                                <?php } else { ?>
                                  <h5><b>Time: </b><?php echo $hora; ?></h5>
                                <?php } ?>
                              </div>
                              <div class="col-md">
                                <h5><b>Description: </b><?php echo $descripcion; ?></h5>

                              </div>
                            </div>
                        <?php
                          }
                        }
                        ?>

                      </div>
                    </div>
                    <div class="mb-4">
                      <a href="./editar_mascota.php?id=<?php echo $idMascota; ?>" class="btn btn-success mr-3">
                        Edit
                      </a>
                      <a href="./borrar_mascota.php?id=<?php echo $idMascota; ?>" class="btn btn-danger mr-3" title="Borrar Registro" data-toggle="tooltip" onclick="return confirm('¿Estás seguro de eliminar esta mascota?')">
                        Delete
                      </a>
                    </div>
                  </div>
        </div>
        </li>

    <?php
              } // Fin del bucle while
            } else {
              echo "You do not have any pets yet :(";
            }

            // Cerrar la conexión
            $mysqli->close();
    ?>


    </ul>
      </div>
    </div>
    </div>

    <div class="mb-5 mt-5 d-flex justify-content-center">
      <a href="./registrarmascota.php" class="btn btn-primary rounded-input ftco-animate " id="boton">Register Pet</a>
    </div>

  </section>

  <footer class="footer">
    <div class="container">
      <div class="row" style="justify-content:space-evenly;">
        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
          <h2 class="footer-heading">Pawsome Makeovers</h2>
          <p>At "Pawsome Makeovers," a charming veterinary clinic, we lovingly care for and beautify your pets with expertise, offering medical and aesthetic services to ensure their happiness and well-being.</p>
          <ul class="ftco-footer-social p-0">
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
          <h2 class="footer-heading">Links</h2>
          <ul class="list-unstyled">
            <li><a href="../welcome.php" class="py-1 d-block">Home</a></li>
            <li><a href="./products.php" class="py-1 d-block">Products</a></li>
            <li><a href="./services.php" class="py-1 d-block">Services</a></li>
            <li><a href=".aboutus.php" class="py-1 d-block">About Us</a></li>
            <li><a href=".contactus.php" class="py-1 d-block">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
          <h2 class="footer-heading">Customer Care</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon fa fa-map"></span><span class="text">Av. Antonio de Deza Y Ulloa 210, San Felipe I Etapa, 31203 Chihuahua, Chih. México</span></li>
              <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+52-614-413-1002</span></a></li>
              <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">pawsomemks@gmail.com</span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Created by Vanessa Enriquez, Abraham Camacho, and José Antonio Rosales.<br>Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
  </div>

  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.easing.1.3.js"></script>
  <script src="../assets/js/jquery.waypoints.min.js"></script>
  <script src="../assets/js/jquery.stellar.min.js"></script>
  <script src="../assets/js/jquery.animateNumber.min.js"></script>
  <script src="../assets/js/bootstrap-datepicker.js"></script>
  <script src="../assets/js/jquery.timepicker.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../assets/js/scrollax.min.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="https://kit.fontawesome.com/a41d3240c2.js" crossorigin="anonymous"></script>
</body>

</html>