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
  header("Location: iniciarsesion.php");
  exit();
}

$nombre = $edad = $especie = $raza = $genero = $foto = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = $_POST["nombre"];
  $edad = intval($_POST["edad"]);
  $especie = $_POST["especie"];
  $raza = $_POST["raza"];
  $genero = intval($_POST["genero"]);
  $foto = addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));

  $sql = "INSERT INTO mascotas (nombre, edad, especie, raza, genero, foto, duenno) VALUES ('$nombre', $edad, '$especie', '$raza', $genero, '$foto', $duenno);";
  if ($mysqli->query($sql)) {
    ob_clean();
    header("Location: mascotas.php");
    exit();
  } else {
    header("Location: mascotas.php");
    exit();
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrar Mascota</title>
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

    /* Estilo personalizado para el botón de navegación */
    .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
      background-color: #f8f9fa;
      /* Cambiar color de fondo */
      color: #343a40;
      /* Cambiar color del texto */
      border-radius: 4px;
    }

    /* Cambiar color del botón cuando se coloca el cursor sobre él */
    .custom-file-upload:hover {
      background-color: #e2e6ea;
    }

    /* Estilo personalizado para ocultar el texto "Browse" y "No file selected" */
    .custom-file-upload input[type="file"] {
      position: absolute;
      left: 0;
      top: 0;
      opacity: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }
  </style>
</head>

<body class="fondohuellas">
  <!--Navbar start-->
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">

      <div class="row">
        <a href="./registerpet.php">
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

  <!-- END nav -->

  <!--LogIn -->
  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-6 col-sm-8 col-10">
        <form class="card ftco-animate" method="post" id="formularioRegistro" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
          <div class=" card-body p-5">
            <h2 class="text-center mb-4" style="color: #576ca8; font-family:inherit; font-weight:600;">
              ¡Registra Tu Mascota!
            </h2>

            <div class="d-flex justify-content-center mb-4 circle-container">
              <img class="circle-img" src="https://img.freepik.com/foto-gratis/perro-beagle-sentado-fondo-blanco_53876-30186.jpg?w=740&t=st=1691531323~exp=1691531923~hmac=495361b7bcc9e1ca3676247a082f621419f411c1f4d2bb957a75acd206cca1f3" alt="Imagen de perfil" />
            </div>

            <div class="mb-3">
              <input type="text" class="form-control rounded-input" placeholder="Nombre" id="nombre" name="nombre" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="number" class="form-control rounded-input" placeholder="Edad (años)" id="edad" name="edad" min="0" max="25" required>
              </div>
              <div class="col-md-6 mb-3">
                <select type="text" class="form-control rounded-input" id="especie" name="especie" required>
                  <option disabled selected>Especie</option>
                  <option value="Perro">Perro</option>
                  <option value="Gato">Gato</option>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <input type="text" class="form-control rounded-input" placeholder="Raza" id="raza" name="raza" required>
            </div>

            <div class=" mb-3">
              <select type="text" class="form-control rounded-input" id="genero" name="genero" required>
                <option disabled selected>Género</option>
                <option value="1">Macho</option>
                <option value="0">Hembra</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <div class="input-group">
                <label class="custom-file-upload">
                  <span id="file-selected">Seleccionar archivo</span>
                  <input type="file" id="foto" name="foto" accept="image/*" style="display: none;">
                </label>
              </div>
            </div>


            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary rounded-input" id="boton" style="width: 75%; height: 45px;" disabled>Registrar Mascota</button>
            </div>
            <div class="mt-3 text-center">
              <p>
                <a href="./mascotas.php" style="color: #659ed3">Cancelar</a>
              </p>
            </div>
          </div>
        </form>
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

  <!--Loader-->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../assets/js/google-map.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/huellitas.js"></script>
  <script>
    // Esperamos a que el DOM esté listo
    document.addEventListener("DOMContentLoaded", function() {
      // Obtenemos los elementos relevantes
      const especieSelect = document.getElementById("especie");
      const botonRegistrar = document.getElementById("boton");

      // Agregamos un evento de cambio al elemento select
      especieSelect.addEventListener("change", function() {
        // Habilitamos el botón si se selecciona "Perro" o "Gato"
        if (especieSelect.value === "Perro" || especieSelect.value === "Gato") {
          botonRegistrar.disabled = false;
        } else {
          botonRegistrar.disabled = true;
        }
      });
    });
  </script>
  <script>
    const fileInput = document.getElementById("foto");
    const fileLabel = document.getElementById("file-selected");

    fileInput.addEventListener("change", function() {
      if (fileInput.files.length > 0) {
        fileLabel.textContent = fileInput.files[0].name;
      } else {
        fileLabel.textContent = "Seleccionar archivo";
      }
    });
  </script>

</body>

</html>