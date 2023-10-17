<?php
require_once "./config.php";

session_start();

$veterinarioIniciadoSesion = false;
if (isset($_SESSION['usuario'])) {
  $veterinarioIniciadoSesion = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Administrador</title>
  <link rel="shortcut icon" href="favicon.ico" type="./assets/images/huellita.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./assets/css/animate.css">
  <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="./assets/css/magnific-popup.css">
  <link rel="stylesheet" href="./assets/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="./assets/css/jquery.timepicker.css">
  <link rel="stylesheet" href="./fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="shortcut icon" type="image/png" href="./assets/images/huellita.ico">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <div class="row">
      <a href="./veterinarian.php">
          <img src="./assets/images/boton es.png" alt="Logo" style="width: 40px" href="./index.php"> <!--IngléS?-->
      </a>
      <a class="navbar-brand mt-1 ml-2" href="./veterinario.php"> Pawsome Makeovers</a> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>

      </div>
      
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="./pages/veterinario/productos.php" class="nav-link">Productos</a></li>
            <li class="nav-item"><a href="./pages/veterinario/medicamentos.php" class="nav-link">Medicamentos</a></li>
            <li class="nav-item"><a href="./pages/appointments.php" class="nav-link">Citas</a></li>
            <li class="nav-item"><a href="./pages/myaccount.php" class="nav-link">Mi Cuenta</a></li>
        </ul>
      </div>
  </div>
</nav>

  <!-- END nav -->

  <!--Presentación de la página-->

  <div class="hero-wrap js-fullheight" id="contenedor-bienvenida" style="background-image: url('./assets/images/Bienvenida-foto.png') ;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-11 ftco-animate d-flex align-items-center">
          	<div class="text w-100">
	            <h1 class="mb-2" id="bienvenido-titulo">BIENVENIDO A </h1>
	            <h1 class="mb-2" id="pawsome-titulo">Pawsome Makeovers</h1>
	            <h3 class="mb-2" id="pawsome-titulo">(Administrador)</h3>

            </div>
          </div>
        </div>
      </div>
  </div>

  <section class="ftco-section bg-light ftco-no-pt ftco-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
                <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-blind"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Gestión de Medicamentos</h3>
                        <p>
                        Te otorgamos un control completo sobre la gestión de medicamentos. Además de visualizar la lista actual de medicamentos, tienes la capacidad de editar los detalles de medicamentos existentes para asegurar que la información refleje de manera precisa las indicaciones y posologías. Además, eres libre de agregar nuevos medicamentos cuando sea necesario
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
    <div class="d-block services text-center">
        <div class="icon d-flex align-items-center justify-content-center">
            <span class="flaticon-dog-eating"></span>
        </div>
        <div class="media-body">
            <h3 class="heading">Administración de Productos</h3>
            <p>Reconocemos la importancia de mantener la precisión en la información sobre productos. Como administrador, puedes realizar ediciones en los detalles de los productos existentes para mantener la información actualizada
            </p>
        </div>
    </div>
</div>
<div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
    <div class="d-block services text-center">
        <div class="icon d-flex align-items-center justify-content-center">
            <span class="flaticon-grooming"></span>
        </div>
        <div class="media-body">
            <h3 class="heading">Visibilidad de Citas</h3>
            <p>i bien no tienes la capacidad de programar nuevas citas, puedes acceder a una vista completa de las citas ya programadas. Esta función te permite mantener una visión general de tu horario y garantizar que estés preparado para las próximas consultas
            </p>
        </div>
    </div>
</div>

  </section>

  <section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="col-md-5 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(./assets/images/about-1.jpg);">
                </div>
            </div>
            <div class="col-md-7 pl-md-5 py-md-5">
                <div class="heading-section pt-md-5">
                    <h2 class="mb-4">Valores</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
                        <div class="text pl-3">
                            <h4>Compasión</h4>
                            <p>Nos guía una profunda compasión por los animales y su bienestar. Nuestro compromiso de brindar un cuidado excelente surge de nuestro genuino amor por los animales, y tratamos a cada paciente como si fuera nuestro propio compañero</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
                        <div class="text pl-3">
                            <h4>Integridad</h4>
                            <p>Nuestra base se cimenta en la integridad. Mantenemos los más altos estándares éticos en todas nuestras interacciones, asegurando transparencia, honestidad y confianza con nuestros clientes, pacientes y colaboradores</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-emergency-call"></span></div>
                        <div class="text pl-3">
                            <h4>Experiencia</h4>
                            <p>Nuestro equipo está compuesto por profesionales altamente capacitados que son expertos en sus campos. Invertimos constantemente en aprendizaje y desarrollo para asegurar que ofrezcamos la atención veterinaria más actualizada y avanzada</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
                        <div class="text pl-3">
                            <h4>Empatía</h4>
                            <p>Comprendemos el vínculo emocional entre las mascotas y sus dueños. Escuchamos de manera activa a nuestros clientes, reconociendo sus preocupaciones y emociones, y brindamos apoyo no solo a los animales, sino también a sus compañeros humanos durante momentos de estrés e incertidumbre</p>
                        </div>
                    </div>
                </div>
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


  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./assets/js/jquery.easing.1.3.js"></script>
  <script src="./assets/js/jquery.waypoints.min.js"></script>
  <script src="./assets/js/jquery.stellar.min.js"></script>
  <script src="./assets/js/jquery.animateNumber.min.js"></script>
  <script src="./assets/js/bootstrap-datepicker.js"></script>
  <script src="./assets/js/jquery.timepicker.min.js"></script>
  <script src="./assets/js/owl.carousel.min.js"></script>
  <script src="./assets/js/jquery.magnific-popup.min.js"></script>
  <script src="./assets/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="./assets/js/google-map.js"></script>
  <script src="./assets/js/main.js"></script>



</body>

</html>