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
    header("Location: ./login.php");
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
  <title>Sign Up</title>
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
        <a href="./registrarse.php">
            <img src="../assets/images/boton es.png" alt="Logo" style="width: 40px" href="./welcome.php"> <!--IngléS?-->
        </a>
        <a class="navbar-brand mt-1 ml-2" href="../welcome.php"> Pawsome Makeovers</a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> Menu
      </button>

      </div>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <?php if (!$usuarioIniciadoSesion = false) { ?>
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

  <!-- END nav -->

  <!--LogIn -->
  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-6 col-sm-8 col-10">
        <form class="card ftco-animate" method="post" id="formularioRegistro">
          <div class=" card-body p-5">
            <h2 class="text-center mb-4" style="color: #576ca8; font-family:inherit; font-weight:600;">
                Sign up!
            </h2>
            <div class="d-flex justify-content-center mb-4 circle-container">
              <img class="circle-img" src="https://img.freepik.com/fotos-premium/gatito-britanico-pelo-corto-sentado-mirando_191971-4588.jpg?w=740" alt="Imagen de perfil" />
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control rounded-input" placeholder="Name" id="nombres" name="nombres" required>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control rounded-input" placeholder="Last name" id="apellidos" name="apellidos" required>
              </div>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control rounded-input" placeholder="Address" id="direccion" name="direccion" required>
            </div>
            <div class="mb-3">
              <input type="tel" class="form-control rounded-input" placeholder="Phone number" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3 text-center">
              <input type="email" class="form-control rounded-input" placeholder="Email" id="email" name="correo" required onkeyup="verificarCorreo()">
              <span id="correoError" style="font-size: 14px; color: firebrick;"></span> <!-- Elemento para mostrar el mensaje de correo ya registrado -->
            </div>
            <div class="mb-4 text-center">
              <input type="password" class="form-control rounded-input" placeholder="Password" id="contra" name="contra" required onkeyup="validarContrasenaEnTiempoReal(); mostrarCoincidenciaContrasenas();">
              <span id="contraError" style="font-size: 14px; color: firebrick;"></span> <!-- Elemento para mostrar el mensaje de error de contraseña -->
            </div>
            <div class="mb-4 text-center">
              <input type="password" class="form-control rounded-input" placeholder="Repeat password" id="contra2" name="contra2" required onkeyup="validarContrasenaEnTiempoReal(); mostrarCoincidenciaContrasenas();">
              <span id="contra2Error" style="font-size: 14px; color: firebrick;"></span> <!-- Elemento para mostrar el mensaje de error de coincidencia de contraseñas -->
            </div>

            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary rounded-input" id="boton" style="width: 50%; height: 45px;" disabled>Sign Up</button>
            </div>
            <div class="mt-3 text-center">
              <p>
                Do you already have an account?
                <a href="login.php" style="color: #659ed3">Log in here</a>
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
              correoError.textContent = "This email is already registered.";
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
        contraErrorElement.textContent = "The password must be at least 8 characters long, include one uppercase letter, one lowercase letter, and one number.";
        return false;
      } else {
        contraErrorElement.textContent = "";
      }

      if (!coincidenContrasenas) {
        contra2ErrorElement.textContent = "Passwords do not match.";
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