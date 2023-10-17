<?php
require_once "../config.php";

session_start();

$usuarioIniciadoSesion = false;
if (isset($_SESSION['usuario'])) {
  $usuarioIniciadoSesion = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sobre Nosotros</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/huellita.ico">
  <meta charset="utf-8">
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
        <a href="./aboutus.php">
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
  <!--Navbar end -->

  <section class="hero-wrap hero-wrap-2" style="background-image: url('../assets/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs mb-2"><span class="mr-2"><a href="../index.php">Inicio<i class="ion-ios-arrow-forward"></i></a></span> <span>Sobre nosotros<i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Sobre nosotros</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
      <div class="row d-flex no-gutters">
        <div class="col-md-5 d-flex">
          <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(../assets/images/about-1.jpg);">
          </div>
        </div>
        <div class="col-md-7 pl-md-5 py-md-5">
          <div class="heading-section pt-md-5">
            <h2 class="mb-4">Plan estratégico</h2>
          </div>
          <div class="row">
            <div class="col-md-6 services-2 w-100 d-flex">
              <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
              <div class="text pl-3">
                <h4>Justificación</h4>
                <p>Como equipo de desarrollo web, reconocemos la importancia de crear un sitio web para fomentar la confianza y la participación con los clientes.</p>
              </div>
            </div>
            <div class="col-md-6 services-2 w-100 d-flex">
              <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
              <div class="text pl-3">
                <h4>Atención al cliente</h4>
                <p>Nos especializamos en un trato cercano con el cliente puesto que consideramos que un cliente 
                    satisfecho es la mejor publicidad </p>
              </div>
            </div>
            <div class="col-md-6 services-2 w-100 d-flex">
              <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-emergency-call"></span></div>
              <div class="text pl-3">
                <h4>Vision</h4>
                <p>Nos esforzamos por ser reconocidos como una clínica veterinaria líder, con un equipo altamente 
                    calificado y dedicado que brinda un ambiente cálido y amigable, y donde los propietarios 
                    confíen plenamente en nosotros para la atención de sus seres queridos de cuatro patas.</p>
              </div>
            </div>
            <div class="col-md-6 services-2 w-100 d-flex">
              <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
              <div class="text pl-3">
                <h4>Mision</h4>
                <p>Nuestra misión en la veterinaria Pawsome Makeovers es proporcionar el más alto 
                    nivel de atención médica y bienestar para todas las mascotas que atendemos.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light ftco-faqs">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 order-md-last">
          <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(../assets/images/Tombyplaya.jpg);">
          </div>
          <div class="d-flex mt-3">
            <div class="img img-2 mr-md-2" style="background-image:url(../assets/images/Gordo1.jpeg);"></div>
            <div class="img img-2 ml-md-2" style="background-image:url(../assets/images/Gordo2.jpeg);"></div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="heading-section mb-5 mt-5 mt-lg-0">
            <h2 class="mb-3">Preguntas frecuentes</h2>
            <p>Preguntas frecuentes: </p>
          </div>
          <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
            <div class="card">
              <div class="card-header p-0" id="headingOne">
                <h2 class="mb-0">
                  <button href="#collapseOne" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                    <p class="mb-0">¿Por qué elegirnos?</p>
                    <i class="fa" aria-hidden="true"></i>
                  </button>
                </h2>
              </div>
              <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-body py-3 px-0">
                  <ol>
                    <li>Excelente servicio al cliente</li>
                    <li>Enfoque moderno y de alta calidad</li>
                    <li>Amplio horario de atención </li>
                  </ol>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header p-0" id="headingTwo" role="tab">
                <h2 class="mb-0">
                  <button href="#collapseTwo" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                    <p class="mb-0">¿Cómo es nuestro trato hacia tus mascotas?</p>
                    <i class="fa" aria-hidden="true"></i>
                  </button>
                </h2>
              </div>
              <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-body py-3 px-0">
                  <ol>
                    <li>Amabilidad </li>
                    <li>Dedicación</li>
                    <li>Profesionalismo</li>
                    <li>Cuidado </li>
                  </ol>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header p-0" id="headingThree" role="tab">
                <h2 class="mb-0">
                  <button href="#collapseThree" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                    <p class="mb-0">¿Qué servicios ofrecemos?</p>
                    <i class="fa" aria-hidden="true"></i>
                  </button>
                </h2>
              </div>
              <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-body py-3 px-0">
                  <ol>
                    <li>Baños para cada necesidad </li>
                    <li>Limpieza dental </li>
                    <li>Cortes de pelo</li>
                    <li>Corte de uñas</li>
                    <li>Limpieza de oídos </li>
                  </ol>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header p-0" id="headingFour" role="tab">
                <h2 class="mb-0">
                  <button href="#collapseFour" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">
                    <p class="mb-0">¿Qué animales atendemos? </p>
                    <i class="fa" aria-hidden="true"></i>
                  </button>
                </h2>
              </div>
              <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-body py-3 px-0">
                  <p> Animales domésticos como: gatos, perros, roedores pequeños y algunos animales exóticos</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section testimony-section" style="background-image: url('../assets/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center pb-5 mb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2>Clientes satisfechos   &amp; Comentarios</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">Mi labrador, Rocky, es un tanto nervioso, pero el equipo de la veterinaria lo maneja muy bien. Siempre se aseguran de que se sienta cómodo y seguro durante las visitas.
                     Los precios son razonables y siento que la atención que recibimos vale cada centavo. ¡Gracias por cuidar de Rocky</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(../assets/images/person_1.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">Carlos Rodríguez</p>
                      <span class="position">Abogado</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">Mi conejito, Caramelito, es parte de la familia, y en la veterinaria lo tratan como tal. El veterinario siempre se toma el tiempo para responder a mis preocupaciones y 
                    me ha brindado consejos útiles para mantener a Caramelito sano. Estoy agradecida por su enfoque amigable y profesional.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(../assets/images/person_2.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">Andrea Martínez</p>
                      <span class="position">Programadora</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">La veterinaria ha sido un salvavidas para mi perro, Luna. Tenía una lesión en la pata y necesitaba cirugía. El equipo fue muy profesional y cuidadoso. Siempre respondieron a mis preguntas
                     y me dieron instrucciones claras para el cuidado posterior. Luna se está recuperando bien y eso es gracias a ellos.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(../assets/images/person_3.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">Juan Pérez</p>
                      <span class="position">Panadero</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">Estoy encantada con la atención que recibimos en la veterinaria. El personal siempre trata a mi gato, 
                    Max, con tanto cariño y paciencia. Desde las revisiones de rutina hasta 
                    su cirugía, siempre nos mantienen informados y tranquilos. ¡Recomiendo esta clínica a todos los dueños de mascotas.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(../assets/images/person_1.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">María González</p>
                      <span class="position">Médico</span>
                    </div>
                  </div>
                </div>
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
</body>

</html>