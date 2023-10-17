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
    header("Location: ./account.php");
  } else {
    echo "Error al guardar el registro";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Services & Appointments</title>
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
        <a href="./cuenta.php">
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

  <section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url(../assets/images/bg_3.jpg)">
    <div class="overlay"></div>
    <div class="container">
      <div class="row d-md-flex justify-content-end">
        <div class="col-md-12 col-lg-6 half p-3 py-5 pl-lg-5 ftco-animate">
          <h2 class="mb-4">Schedule an Appointment</h2>
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
                            echo "<option disabled>Pet</option>";
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
                    <input id="fecha" name="fecha" type="date" class="form-control" placeholder="Date" min="<?php echo date('Y-m-d'); ?>" required />
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
                      <option value="Medical Appointment">Medical Appointment</option>
                      <option value="Grooming Service">Grooming Service</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea name="descripcion" id="descripcion" cols="30" rows="7" class="form-control" placeholder="Description" required></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="submit" id="boton" value="Schedule" class="btn btn-primary py-3 px-4" />
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
          <p>At "Pawsome Makeovers," a charming veterinary, we care for and beautify your pets with love and expertise, offering medical and grooming services to ensure their happiness and well-being.</p>
          <ul class="ftco-footer-social p-0">
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
          <h2 class="footer-heading">Links</h2>
          <ul class="list-unstyled">
            <li><a href="../index.php" class="py-1 d-block">Home</a></li>
            <li><a href="./products.php" class="py-1 d-block">Products</a></li>
            <li><a href="#" class="py-1 d-block">Services</a></li>
            <li><a href="./aboutus.php" class="py-1 d-block">About Us</a></li>
            <li><a href="./contact.php" class="py-1 d-block">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
          <h2 class="footer-heading">Customer Support</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon fa fa-map"></span><span class="text">210 Antonio de Deza Y Ulloa Ave, San Felipe I Etapa, 31203 Chihuahua, Chih. Mexico</span></li>
              <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+52-614-413-1002</span></a></li>
              <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">pawsomemks@gmail.com</span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Made by Vannesa Enriquez, Abraham Camacho, and José Antonio Rosales<br>Copyright &copy;
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
    const scheduleButton = document.getElementById('button');

    appointmentDateInput.addEventListener('input', function() {
      const selectedDate = new Date(appointmentDateInput.value);
      const currentDate = new Date();
      if (selectedDate < currentDate) {
        scheduleButton.disabled = true;
      } else {
        scheduleButton.disabled = false;
      }
    });
  </script>
</body>

</html>