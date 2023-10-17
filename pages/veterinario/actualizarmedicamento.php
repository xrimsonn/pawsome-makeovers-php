<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../../config.php";

session_start();

if (isset($_GET['id'])) {
  $_SESSION['idMed'] = $_GET['id'];
}
$idMedicamento = $_SESSION['idMed'];
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
  header("Location: ../iniciarsesion.php");
  exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = $_POST["nombre"];
  $especie = $_POST["especie"];
  $efecto = $_POST["efecto"];
  $precio = intval($_POST["precio"]);
  $dosis = $_POST["dosis"];


  $sql_medicamento = "UPDATE medicamentos SET nombre = '$nombre', precio = $precio, especie = '$especie', dosis = '$dosis', efecto = '$efecto' WHERE id_medicamento = $idMedicamento";

  if ($mysqli->query($sql_medicamento)) {
    header("Location: ./medicamentos.php");
    exit();
  }
} else {
  $sqlMedi = "SELECT * FROM medicamentos WHERE id_medicamento = $idMedicamento";
  $resultMed = $mysqli->query($sqlMedi);

  if ($resultMed->num_rows == 1) {
    $row_med = $resultMed->fetch_assoc();
    $nombre = $row_med["nombre"];
    $precio = intval($row_med["precio"]);
    $especie = $row_med["especie"];
    $efecto = $row_med["efecto"];
    $dosis = $row_med["dosis"];
  }
}

var_dump($especie, $dosis, $precio, $sqlMedi);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Actualizar Medicamento</title>
  <link rel="shortcut icon" type="image/png" href="../../assets/images/huellita.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/animate.css">
  <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../../assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../../assets/css/jquery.timepicker.css">
  <link rel="stylesheet" href="../../fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <style>
    .wrapper {
      width: 600px;
      margin: 0 auto;
    }

    body {
      background-size: cover;
      background: #d4e4d4;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <div class="row">
        <a href="./updatemed.php">
          <img src="../../assets/images/boton es.png" alt="Logo" style="width: 40px" href="./index.php"> <!--IngléS?-->
        </a>
        <a class="navbar-brand mt-1 ml-2" href="../../veterinario.php"> Pawsome Makeovers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> Menu
        </button>

      </div>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="./productos.php" class="nav-link">Productos</a></li>
          <li class="nav-item"><a href="./medicamentos.php" class="nav-link">Medicamentos</a></li>
          <li class="nav-item"><a href="./vercitas.php" class="nav-link">Citas</a></li>
          <li class="nav-item"><a href="./micuenta.php" class="nav-link">Mi Cuenta</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- END nav -->


  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card card-body">
          <h2 class="text-center mb-4" style="color: #576ca8; font-family:inherit; font-weight:600;"> Actualizar Medicamento</h2>
          <p>Por favor actualice los datos del medicamento.</p>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
              <span class="invalid-feedback"><?php echo $nombre_err; ?></span>
            </div>
            <div class="form-group">
              <label>Especie</label>
              <input type="text" name="especie" class="form-control" value="<?php echo $especie; ?>">
              <span class="invalid-feedback"><?php echo $especie_err; ?></span>
            </div>
            <div class="form-group">
              <label>Efecto</label>
              <input type="text" name="efecto" class="form-control" value="<?php echo $efecto; ?>">
              <span class="invalid-feedback"><?php echo $efecto_err; ?></span>
            </div>
            <div class="form-group">
              <label>Precio</label>
              <input type="number" step="0.01" name="precio" class="form-control" value="<?php echo $precio; ?>">
              <span class="invalid-feedback"><?php echo $precio_err; ?></span>
            </div>
            <div class="form-group">
              <label>Dosis</label>
              <input type="text" name="dosis" class="form-control" value="<?php echo $dosis; ?>">
              <span class="invalid-feedback"><?php echo $dosis_err; ?></span>
            </div>
            <input type="hidden" name="id_medicamento" value="<?php echo $id; ?>" />
            <input type="submit" class="btn btn-primary" value="Guardar">
            <a href="medicamentos.php" class="btn btn-secondary ml-2">Cancelar</a>
          </form>
        </div>
      </div>
    </div>
  </div>

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
            <li><a href="#" class="py-1 d-block">Inicio</a></li>
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
            Hecho por Vanessa Enriquez, Abraham Camacho y José Antonio Rosales<br>Copyright &copy;
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
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/jquery.easing.1.3.js"></script>
  <script src="../../assets/js/jquery.waypoints.min.js"></script>
  <script src="../../assets/js/jquery.stellar.min.js"></script>
  <script src="../../assets/js/jquery.animateNumber.min.js"></script>
  <script src="../../assets/js/bootstrap-datepicker.js"></script>
  <script src="../../assets/js/jquery.timepicker.min.js"></script>
  <script src="../../assets/js/owl.carousel.min.js"></script>
  <script src="../../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../../assets/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../../assets/js/google-map.js"></script>
  <script src="../../assets/js/main.js"></script>



</body>

</html>