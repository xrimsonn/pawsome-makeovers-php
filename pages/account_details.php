<?php
include "../config.php";

session_start();

$usuarioIniciadoSesion = false;
if (isset($_SESSION['usuario'])) {
  $usuarioIniciadoSesion = true;
} else {
  header("Location: login.php");
  exit();
}

if (isset($_GET['cerrar_sesion'])) {
  session_unset();
  session_destroy();
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>My Account</title>
  <link rel="shortcut icon" href="favicon.ico" type="../assets/images/huellita.ico">
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
        <a href="./detalles_cuenta.php">
            <img src="../assets/images/boton es.png" alt="Logo" style="width: 40px" href="./welcome.php"> <!--IngléS?-->
        </a>
        <a class="navbar-brand mt-1 ml-2" href="../welcome.php"> Pawsome Makeovers</a> 
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
          <p class="breadcrumbs mb-2"><span class="mr-2"><a href="../index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My Account <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Account details</h1>
        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section bg-light pb-5 pt-5">
    <div class="mr-5 ml-5 ftco-animate">
      <div class="block-7">
        <div class="p-4">
          <span class="text-left excerpt d-block pt-1 pb-3">
            <h3>Account settings</h3>
          </span>
          <ul class="text-center pricing-text mb-5">

            <?php
            $correoU = $_SESSION["usuario"];
            $sql_user = "SELECT id_user, nombres, apellidos, telefono, correo, direccion FROM usuarios WHERE correo = '$correoU'";
            $resultado_user = $mysqli->query($sql_user);

            if ($resultado_user->num_rows > 0) {
              while ($fila = $resultado_user->fetch_assoc()) {
                $id_user = $fila["id_user"];
                $nombres = $fila["nombres"];
                $apellidos = $fila["apellidos"];
                $telefono = $fila["telefono"];
                $correo = $fila["correo"];
                $direccion = $fila["direccion"];
              }
            }

            $sql_pet = "SELECT COUNT(*) FROM mascotas WHERE duenno = $id_user";
            $resultado_pet = $mysqli->query($sql_pet);
            if ($resultado_pet->num_rows > 0) {
              while ($fila = $resultado_pet->fetch_assoc()) {
                $num_mascotas = $fila["COUNT(*)"];
              }
            }
            ?>

            <li class="pb-1">
              <h3><b>First Name(s): </b><?php echo $nombres; ?></h3>
            </li>
            <li class="pb-1">
              <h3><b>Last Name(s): </b><?php echo $apellidos; ?></h3>
            </li>
            <li class="pb-1">
              <h3><b>Email: </b><?php echo $correo; ?></h3>
            </li>
            <li class="pb-1">
              <h3><b>Number of Pets: </b><?php echo $num_mascotas; ?>/15</h3>
            </li>
            <li class="pb-1">
              <h3><b>Address: </b><?php echo $direccion; ?></h3>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="mb-5 mt-5 d-flex justify-content-center">
      <a href="?cerrar_sesion=true" class="btn btn-primary rounded-input ftco-animate " id="boton">Log out</a>
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