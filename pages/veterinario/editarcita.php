<?php
require_once "../../config.php";

session_start();


if (isset($_GET['id'])) {
  $_SESSION['idCita'] = $_GET['id'];
}

$idCita = $_SESSION['idCita'];

$usuarioIniciadoSesion = false;
if (isset($_SESSION['usuario'])) {
  $usuarioIniciadoSesion = true;
} else {
  header("Location: iniciarsesion.php");
  exit();
}

$fecha = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $hora = $_POST["hora"].":00";
  $realizada = intval($_POST["realizada"]);
  $fecha = $_POST["fecha"];
  
  var_dump($realizada);
  
  if (!($fecha == "")) {
    $sqlEditar = "UPDATE citas SET fecha = '$fecha', hora = '$hora', realizada = $realizada WHERE id_cita = $idCita";
  } else {
    $sqlEditar = "UPDATE citas SET hora = '$hora', realizada = $realizada WHERE id_cita = $idCita";
  }

  var_dump($sqlEditar);

  if ($mysqli->query($sqlEditar)) {
    header("Location: ./vercitas.php ");
    exit();
  }
} else {
  $sql_citas = "SELECT * FROM citas WHERE id_cita = $idCita";
  $result_cita = $mysqli->query($sql_citas);

  if ($result_cita->num_rows == 1) {
    $row = $result_cita->fetch_assoc();
    $hora = $row["hora"];
    $fecha = $row["fecha"];
    $realizada = intval($row["realizada"]);
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Agregar Producto</title>
  <link rel="shortcut icon" type="image/png" href="../../assets/images/huellita.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="./createproduct.php">
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

  <div class="container  mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h2 class="text-center mb-4" style="color: #576ca8; font-family:inherit; font-weight:600;">
              Editar Cita
            </h2>
            <p class="card-text text-center">Por favor llena este formulario y envíalo para su actualización.</p>
            <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="accion" value="insertar">

              <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" value="<?php echo $fecha; ?>" class="form-control" id="fecha" name="fecha" required>
              </div>

              <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" value="<?php echo $hora; ?>" class="form-control" id="hora" name="hora" required>
              </div>

              <div class="form-group">
                <label for="type_product">Realizada:</label>
                <select type="text" class="form-control rounded-input" id="realizada" name="realizada" required>
                  <option value="1">Si</option>
                  <option value="0" selected>No</option>
                </select>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary rounded-input" id="boton" style="width: 50%; height: 45px;">Guardar</button>
              </div>
            </form>
          </div>
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
  <script>
    const horaInput = document.getElementById('hora');

    // Agregar un evento al cambiar el valor del input
    horaInput.addEventListener('input', () => {
      const ahora = new Date();
      const horaActual = ahora.getHours();
      const minutoActual = ahora.getMinutes();

      // Obtener la hora seleccionada por el usuario
      const horaSeleccionada = horaInput.value.split(":")[0];
      const minutoSeleccionado = horaInput.value.split(":")[1];

      // Comparar la hora seleccionada con la hora actual
      if (horaSeleccionada < horaActual || (horaSeleccionada == horaActual && minutoSeleccionado < minutoActual)) {
        horaInput.setCustomValidity('Selecciona una hora válida.');
      } else {
        horaInput.setCustomValidity('');
      }
    });
  </script>
  <script>
    const fechaInput = document.getElementById('fecha');

    // Obtener la fecha actual
    const ahora = new Date();
    const añoActual = ahora.getFullYear();
    const mesActual = (ahora.getMonth() + 1).toString().padStart(2, '0'); // Los meses van de 0 a 11
    const diaActual = ahora.getDate().toString().padStart(2, '0');

    // Establecer el valor mínimo del input de fecha
    fechaInput.setAttribute('min', `${añoActual}-${mesActual}-${diaActual}`);
  </script>

</body>

</html>
Este código agrega un evento al cambio del valor del input de hora y compara la hora seleccionada por el usuario con la hora actual. Si la hora seleccionada es anterior a la hora actual, se muestra un mensaje de error. De lo contrario, se elimina cualquier mensaje de error.

Por favor, pruébalo y ajústalo según tus necesidades. Recuerda que este ejemplo utiliza JavaScript, por lo que los usuarios con JavaScript desactivado no experimentarán esta funcionalidad.






</script>


</body>





</html>