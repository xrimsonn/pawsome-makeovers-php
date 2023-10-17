<?php
// Incluir el archivo config.php para obtener la conexión a la base de datos
include '../config.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recopilar los datos enviados por el formulario
  $nombre = $_POST["nombres"];
  $apellido = $_POST["apellidos"];
  $direccion = $_POST["direccion"];
  $telefono = $_POST["telefono"];
  $correo = $_POST["correo"];
  $contra = $_POST["contra"];

  // Hashear la contraseña utilizando password_hash
  $hashedContra = password_hash($contra, PASSWORD_DEFAULT);

  // Insertar los datos en la tabla de usuarios (ajusta "tabla_usuarios" con el nombre de tu tabla)
  $sql = "INSERT INTO usuarios (nombres, apellidos, direccion, telefono, correo, contra) VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$correo', '$hashedContra')";

  if ($mysqli->query($sql) === TRUE) {
    echo "Registro guardado exitosamente";
    header("Location: ./iniciarsesion.php");
  } else {
    echo "Error al guardar el registro";
  }
}

// Cerrar la conexión
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrarse</title>
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

<body class="fondohuellas">
  <!--Navbar start-->
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">

      <div class="row">
        <a href="./signup.php">
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
            <li class="nav-item active"><a href="./iniciarsesion.php" class="nav-link">Iniciar Sesion</a></li>
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
        <form class="card ftco-animate" method="post" id="formularioRegistro">
          <div class=" card-body p-5">
            <h2 class="text-center mb-4" style="color: #576ca8; font-family:inherit; font-weight:600;">
              ¡Registrate!
            </h2>
            <div class="d-flex justify-content-center mb-4 circle-container">
              <img class="circle-img" src="https://img.freepik.com/fotos-premium/gatito-britanico-pelo-corto-sentado-mirando_191971-4588.jpg?w=740" alt="Imagen de perfil" />
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control rounded-input" placeholder="Nombres" id="nombres" name="nombres" required>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control rounded-input" placeholder="Apellidos" id="apellidos" name="apellidos" required>
              </div>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control rounded-input" placeholder="Dirección" id="direccion" name="direccion" required>
            </div>
            <div class="mb-3">
              <input type="tel" class="form-control rounded-input" placeholder="Teléfono" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3 text-center">
              <input type="email" class="form-control rounded-input" placeholder="Correo electrónico" id="email" name="correo" required onkeyup="verificarCorreo()">
              <span id="correoError" style="font-size: 14px; color: firebrick;"></span> <!-- Elemento para mostrar el mensaje de correo ya registrado -->
            </div>
            <div class="mb-4 text-center">
              <input type="password" class="form-control rounded-input" placeholder="Contraseña" id="contra" name="contra" required onkeyup="validarContrasenaEnTiempoReal(); mostrarCoincidenciaContrasenas();">
              <span id="contraError" style="font-size: 14px; color: firebrick;"></span> <!-- Elemento para mostrar el mensaje de error de contraseña -->
            </div>
            <div class="mb-4 text-center">
              <input type="password" class="form-control rounded-input" placeholder="Repetir contraseña" id="contra2" name="contra2" required onkeyup="validarContrasenaEnTiempoReal(); mostrarCoincidenciaContrasenas();">
              <span id="contra2Error" style="font-size: 14px; color: firebrick;"></span> <!-- Elemento para mostrar el mensaje de error de coincidencia de contraseñas -->
            </div>

            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary rounded-input" id="boton" style="width: 50%; height: 45px;" disabled>registrarse</button>
            </div>
            <div class="mt-3 text-center">
              <p>
                ¿Ya tienes cuenta?
                <a href="iniciarsesion.php" style="color: #659ed3">Inicia sesión aquí</a>
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
    function verificarCorreo() {
      var correo = document.getElementById("email").value;
      var boton = document.getElementById("boton");
      var correoError = document.getElementById("correoError");

      // Realizar la solicitud AJAX al servidor para verificar si el correo ya está registrado
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var response = xhr.responseText;

            // Si la respuesta es "1", el correo ya está registrado
            // Si la respuesta es "0", el correo no está registrado
            if (response === "1") {
              correoError.textContent = "Este correo ya está registrado.";
              boton.disabled = true;
            } else {
              correoError.textContent = "";
              validarFormularioYBoton(); // Verificar si se puede habilitar el botón
            }
          } else {
            console.log("Error en la solicitud AJAX");
          }
        }
      };

      xhr.open("POST", "./verificar_correo.php", true); // Ruta del archivo PHP que verificará el correo
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("correo=" + correo); // Enviamos el correo como parámetro al archivo PHP
    }


    // Función para validar la contraseña y coincidencia de contraseñas en tiempo real
    function validarContrasenaEnTiempoReal() {
      var contrasena = document.getElementById("contra").value;
      var contra2 = document.getElementById("contra2").value;
      var contraErrorElement = document.getElementById("contraError");
      var contra2ErrorElement = document.getElementById("contra2Error");

      // Verificar que la contraseña tenga al menos 8 caracteres, una mayúscula, una minúscula y un número
      var contrasenaValida = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
      var coincidenContrasenas = contrasena === contra2;

      if (!contrasenaValida.test(contrasena)) {
        contraErrorElement.textContent = "La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número.";
        return false;
      } else {
        contraErrorElement.textContent = "";
      }

      if (!coincidenContrasenas) {
        contra2ErrorElement.textContent = "Las contraseñas no coinciden.";
        return false;
      } else {
        contra2ErrorElement.textContent = "";
      }

      return true;
    }

    // Función para verificar si el formulario es válido y habilitar o deshabilitar el botón de envío
    function validarFormularioYBoton() {
      var contrasenaValida = validarContrasenaEnTiempoReal();
      var correoNoRegistrado = document.getElementById("correoError").textContent === "";

      var boton = document.getElementById("boton");
      boton.disabled = !(contrasenaValida && correoNoRegistrado);
    }

    document.addEventListener("DOMContentLoaded", function() {
      var boton = document.getElementById("boton");
      boton.disabled = true;

      // Agregar los eventos input a los campos de correo y contraseñas
      document.getElementById("email").addEventListener("input", function() {
        verificarCorreo();
      });
      document.getElementById("contra").addEventListener("input", function() {
        validarContrasenaEnTiempoReal();
        validarFormularioYBoton();
      });
      document.getElementById("contra2").addEventListener("input", function() {
        validarContrasenaEnTiempoReal();
        validarFormularioYBoton();
      });
    });
  </script>
</body>

</html>