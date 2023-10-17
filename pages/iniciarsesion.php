<?php
// Incluir el archivo config.php para obtener la conexión a la base de datos
include '../config.php';

session_start();

// Variable para almacenar el mensaje de error
$errorMessage = "";

// Variable para determinar si un veterinario ha iniciado sesión
$veterinarioIniciadoSesion = false;

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recopilar los datos enviados por el formulario
  $correo = $_POST["correo"];
  $contra = $_POST["contra"];
  $_SESSION['correo'] = $correo;

  // Obtener la información del usuario desde la base de datos
  $sql = "SELECT id_user, contra, es_vet FROM usuarios WHERE correo = '$correo'";
  $result = $mysqli->query($sql);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashedContra = $row["contra"];

    // Verificar si la contraseña ingresada coincide con la contraseña hasheada almacenada en la base de datos
    if (password_verify($contra, $hashedContra)) {
      // Verificar si el usuario es un veterinario
      if ($row["es_vet"]) {
        $veterinarioIniciadoSesion = true;
      }

      // Iniciar la sesión y redireccionar al usuario
      $_SESSION["usuario"] = $correo;
      if ($veterinarioIniciadoSesion) {
        header("Location: ../veterinario.php");
      } else {
        header("Location: ../index.php");
      }
      exit(); // Es importante terminar la ejecución del script después de la redirección

    } else {
      $errorMessage = "Contraseña incorrecta";
    }
  } else {
    $errorMessage = "Correo electrónico no encontrado";
  }
}

// Cerrar la conexión
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Iniciar Sesión</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/huellita.ico">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../assets/css/animate.css" />
  <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="../assets/css/magnific-popup.css" />
  <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="../assets/css/jquery.timepicker.css" />
  <link rel="stylesheet" href="../assets/css/flaticon.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(to bottom, #d8ebd3, #d4e4d4);
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
</head>
<!-- Aplicar un background al login (las huellitas)-->

<body class="fondohuellas">
  <!--Navbar start-->
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">

      <div class="row">
        <a href="./login.php">
            <img src="../assets/images/boton eng.png" alt="Logo" style="width: 40px" href="./welcome.php"> <!--IngléS?-->
        </a>
        <a class="navbar-brand mt-1 ml-2" href="../index.php"> Pawsome Makeovers</a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> Menú
      </button>

      </div>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <?php if (!$usuarioIniciadoSesion = false) { ?>
            <li class="nav-item active"><a href="../index.php" class="nav-link">Inicio</a></li>
          <?php } else { ?>
            <li class="nav-item active"><a href="./cuenta.php" class="nav-link">Cuenta</a></li>
          <?php } ?>
          <li class="nav-item">
            <a href="./productos.php" class="nav-link">Productos</a>
          </li>
          <li class="nav-item">
            <a href="./servicios.php" class="nav-link">Servicios</a>
          </li>
          <li class="nav-item">
            <a href="./sobrenosotros.php" class="nav-link">Sobre nosotros</a>
          </li>
          <li class="nav-item">
            <a href="./contactar.php" class="nav-link">Contáctanos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--Navbar end -->

  <!--LogIn -->
  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-6 col-sm-8 col-10">
        <form class="card ftco-animate" action="iniciarsesion.php" method="post" >
          <div class="p-5">
            <h2 class="text-center mb-4" style="color: #576ca8; font-family:inherit; font-weight:600;">
              ¡Inicia Sesión!
            </h2>
            <div class="d-flex justify-content-center mb-4 circle-container">
              <img class="circle-img" src="https://img.freepik.com/premium-photo/british-shorthair-front-white-wall_191971-17751.jpg" alt="Imagen de perfil" />
            </div>
            <div class="mb-3">
              <input type="email" class="form-control rounded-input" placeholder="Correo electrónico" name="correo" id="correo" />
            </div>
            <div class="mb-4">
              <input type="password" class="form-control rounded-input" placeholder="Contraseña" name="contra" id="contra" />
              <!-- Mostrar mensaje de error -->
              <?php if (!empty($errorMessage) && isset($_POST["correo"])) { ?>
                <div style="margin:8px ; text-align: center; font-size: 14px; color: firebrick;"><?php echo $errorMessage; ?></div>
              <?php } ?>
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary rounded-input" id="boton" style="width: 50%; height: 45px;">
                Iniciar sesión
              </button>
            </div>
            <div class="mt-3 text-center">
              <p>
                ¿No tienes una cuenta?
                <a id="registrate" href="registrarse.php">Regístrate aquí</a>
              </p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--Inicio del footer-->
  <footer class="footer">
    <div class="container">
      <div class="row" style="justify-content:space-evenly;">
        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
          <h2 class="footer-heading">Pawsome Makeovers</h2>
          <p>En "Pawsome Makeovers," una veterinaria encantadora, cuidamos y embellecemos a tus mascotas con cariño y especialización, ofreciendo servicios médicos y estéticos para asegurar su felicidad y bienestar.</p>
          <ul class="ftco-footer-social p-0">
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
          <h2 class="footer-heading">Enlaces</h2>
          <ul class="list-unstyled">
            <li><a href="../index.php" class="py-1 d-block">Inicio</a></li>
            <li><a href="./productos.php" class="py-1 d-block">Productos</a></li>
            <li><a href="./servicios.php" class="py-1 d-block">Servicios</a></li>
            <li><a href="./sobrenosotros.php" class="py-1 d-block">Sobre nosotros</a></li>
            <li><a href="./contactar.php" class="py-1 d-block">Contacto</a></li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
          <h2 class="footer-heading">Atención al cliente</h2>
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
            Hecho por Vannesa Enriquez, Abraham Camacho y José Antonio Rosales<br>Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!--Fin del footer-->


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
  </div>

  <!--Link de los scripts-->

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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../assets/js/google-map.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/huellitas.js"></script>
</body>

</html>