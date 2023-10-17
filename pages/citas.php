<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../config.php";

session_start();

$usuarioIniciadoSesion = false;
if (isset($_SESSION['usuario'])) {
  $usuarioIniciadoSesion = true;
} else {
  header("Location: iniciarsesion.php");
  exit();
}

$descripcion = $fecha = $tipo = "";
$mascota = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mascota = intval($_POST["mascota"]);
  $fecha = $_POST["fecha"];
  $descripcion = $_POST["descripcion"];
  $tipo = $_POST["tipo"];

  $sql_cita = "INSERT INTO citas (tipo, mascota, descripcion, fecha) VALUES ('$tipo', '$mascota', '$descripcion', '$fecha')";

  if ($mysqli->query($sql_cita) === TRUE) {
    echo "Registro guardado exitosamente";
    header("Location: ./cuenta.php");
  } else {
    echo "Error al guardar el registro";
  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>Servicios & Citas</title>
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
</head>

<body>
  <!--Navbar start-->
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">

      <div class="row">
        <a href="./account.php">
          <img src="../assets/images/boton eng.png" alt="Logo" style="width: 40px" href="./welcome.php"> <!--IngléS?-->
        </a>
        <a class="navbar-brand mt-1 ml-2" href="../index.php"> Pawsome Makeovers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> Menú
        </button>

      </div>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <?php if (!$usuarioIniciadoSesion) { ?>
            <li class="nav-item active"><a href="./iniciarsesion.php" class="nav-link">Iniciar Sesión</a></li>
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

  <!--section class="hero-wrap hero-wrap-2" style="background-image: url('../assets/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs mb-2"><span class="mr-2"><a href="../index.php">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Mi cuenta <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Mi Cuenta</h1>
        </div>
      </div>
    </div>
  </section-->


  <section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url(../assets/images/bg_3.jpg)">
    <div class="overlay"></div>
    <div class="container">
      <div class="row d-md-flex justify-content-end">
        <div class="col-md-12 col-lg-6 half p-3 py-5 pl-lg-5 ftco-animate">
          <h2 class="mb-4">Agendar Una Cita</h2>
          <form class="appointment" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="form-field">
                    <div class="select-wrap">
                      <div class="icon">
                        <span class="fa fa-chevron-down"></span>
                      </div>
                      <select name="mascota" id="mascota" class="form-control" required>
                        <?php
                        if (isset($_SESSION['correo'])) {
                          $correo = $_SESSION['correo'];
                          $user_query = "SELECT * FROM usuarios WHERE correo = '" . $correo . "'";
                          $result_usuarios = $mysqli->query($user_query);
                          if ($result_usuarios->num_rows > 0) {
                            $row = $result_usuarios->fetch_assoc();
                            $id_duenno = $row["id_user"];
                          }
                          $mascotas = "SELECT * FROM mascotas WHERE duenno = $id_duenno";
                          $result_mascotas = $mysqli->query($mascotas);
                          if ($result_mascotas->num_rows > 0) {
                            echo "<option disabled>Mascota</option>";
                            while ($row = $result_mascotas->fetch_assoc()) {
                              echo "<option value=\"" . $row['id_mascota'] . "\">" . $row["nombre"] . "</option>";
                            }
                          } else {
                            echo "<option disabled>Necesitas registrar al menos una mascota</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-wrap">
                    <input id="fecha" name="fecha" type="date" class="form-control" placeholder="Fecha" min="<?php echo date('Y-m-d'); ?>" required />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="select-wrap">
                    <div class="icon">
                      <span class="fa fa-chevron-down"></span>
                    </div>
                    <select name="tipo" id="tipo" class="form-control required">
                      <option value="Cita Médica">Cita Médica</option>
                      <option value="Servicio Estético">Servicio Estético</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea name="descripcion" id="descripcion" cols="30" rows="7" class="form-control" placeholder="Descripcion" required></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="submit" id="boton" value="Agendar" class="btn btn-primary py-3 px-4" />
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

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
            <li><a href="#" class="py-1 d-block">Servicios</a></li>
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

  <!--Loader-->
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
  <script>
    const appointmentDateInput = document.querySelector('.appointment_date');
    const agendarButton = document.getElementById('boton');

    appointmentDateInput.addEventListener('input', function() {
      const selectedDate = new Date(appointmentDateInput.value);
      const currentDate = new Date();
      if (selectedDate < currentDate) {
        agendarButton.disabled = true;
      } else {
        agendarButton.disabled = false;
      }
    });
  </script>
</body>

</html>