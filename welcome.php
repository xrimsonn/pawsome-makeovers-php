<?php
require_once "./config.php";

session_start();

$usuarioIniciadoSesion = false;
if (isset($_SESSION['usuario'])) {
  $usuarioIniciadoSesion = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pawsome Makeovers</title>
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
      <a href="./index.php">
          <img src="./assets/images/boton es.png" alt="Logo" style="width: 40px" href="./index.php"> <!--IngléS?-->
      </a>
      <a class="navbar-brand mt-1 ml-2" href="./welcome.php"> Pawsome Makeovers</a> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>

      </div>
      
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <?php if (!$usuarioIniciadoSesion) { ?>
            <li class="nav-item active"><a href="./pages/login.php" class="nav-link">Log In</a></li>
          <?php } else { ?>
            <li class="nav-item active"><a href="./pages/account.php" class="nav-link">Account</a></li>
          <?php } ?>
            <li class="nav-item"><a href="./pages/products.php" class="nav-link">Products</a></li>
            <li class="nav-item"><a href="./pages/services.php" class="nav-link">services</a></li>
            <li class="nav-item"><a href="./pages/aboutus.php" class="nav-link">About Us</a></li>
            <li class="nav-item"><a href="./pages/contactus.php" class="nav-link">Contact Us</a></li>
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
	            <h1 class="mb-2" id="bienvenido-titulo">WELCOME TO</h1>
	            <h1 class="mb-2" id="pawsome-titulo">Pawsome Makeovers</h1>
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
                        <h3 class="heading">Medical Plans</h3>
                        <p>
                            We offer different medical plans to provide practical and economical packages to our clients:
                            <ol type="I">
                                <li>Basic Plan</li>
                                <li>24/7 Emergency Plan</li>
                                <li>Comprehensive Care Plan for Dogs and Cats</li>
                                <li>Senior Health Plan for Older Pets</li>
                            </ol>
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
            <h3 class="heading">Medical Services</h3>
            <p>We specialize in providing high-quality medical services for our clients, such as:
                <ul>
                    <li>Vaccination and Deworming</li>
                    <li>Surgeries</li>
                    <li>Nutrition and Dietetics</li>
                    <li>Veterinary Consultations</li>
                </ul>
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
            <h3 class="heading">Grooming Services</h3>
            <p>We offer various aesthetic treatments and care for your pets, including:
                <ul>
                    <li>Bathing and Grooming</li>
                    <li>Haircut and Styling</li>
                    <li>Manicure and Pedicure</li>
                    <li>Flea and Tick Treatments</li>
                </ul>
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
                    <h2 class="mb-4">Why Choose Us?</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
                        <div class="text pl-3">
                            <h4>Care Tips</h4>
                            <p>Maintain consistent care of your pets to provide quality service</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
                        <div class="text pl-3">
                            <h4>Customer Care</h4>
                            <p>We specialize in close customer interactions, believing that a satisfied customer is the best advertisement</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-emergency-call"></span></div>
                        <div class="text pl-3">
                            <h4>Vision</h4>
                            <p>We strive to be recognized as a leading veterinary clinic, with a highly skilled and dedicated team that provides a warm and friendly environment. We want pet owners to have complete trust in us for the care of their beloved four-legged companions.</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
                        <div class="text pl-3">
                            <h4>Mission</h4>
                            <p>Our mission at Pawsome Makeovers Veterinary is to provide the highest level of medical care and well-being for all the pets we serve.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-counter" id="section-counter">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="50">0</strong>
                    </div>
                    <div class="text">
                        <span>Clients</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="8">0</strong>
                    </div>
                    <div class="text">
                        <span>Doctors</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="15">0</strong>
                    </div>
                    <div class="text">
                        <span>Products</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="777">0</strong>
                    </div>
                    <div class="text">
                        <span>Happy Pets</span>
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
          <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(./assets/images/Tombyplaya.jpg);">
          </div>
          <div class="d-flex mt-3">
            <div class="img img-2 mr-md-2" style="background-image:url(./assets/images/Gordo1.jpeg);"></div>
            <div class="img img-2 ml-md-2" style="background-image:url(./assets/images/Gordo2.jpeg);"></div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="heading-section mb-5 mt-5 mt-lg-0">
            <h2 class="mb-3">Frequently Asked Questions</h2>
            <p>Frequently Asked Questions: </p>
          </div>
          <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
            <div class="card">
              <div class="card-header p-0" id="headingOne">
                <h2 class="mb-0">
                  <button href="#collapseOne" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                    <p class="mb-0">Why Choose Us?</p>
                    <i class="fa" aria-hidden="true"></i>
                  </button>
                </h2>
              </div>
              <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-body py-3 px-0">
                  <ol>
                  <li>Excellent customer service</li>
                    <li>Modern and high-quality approach</li>
                    <li>Extended operating hours</li>
                  </ol>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header p-0" id="headingTwo" role="tab">
                <h2 class="mb-0">
                  <button href="#collapseTwo" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                    <p class="mb-0">How do we treat your pets?</p>
                    <i class="fa" aria-hidden="true"></i>
                  </button>
                </h2>
              </div>
              <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-body py-3 px-0">
                  <ol>
                    <li>Kindness</li>
                    <li>Dedication</li>
                    <li>Professionalism</li>
                    <li>Care</li>
                  </ol>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header p-0" id="headingThree" role="tab">
                <h2 class="mb-0">
                  <button href="#collapseThree" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                    <p class="mb-0">What services do we offer?</p>
                    <i class="fa" aria-hidden="true"></i>
                  </button>
                </h2>
              </div>
              <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-body py-3 px-0">
                  <ol>
                    <li>Baths for various needs</li>
                    <li>Dental cleaning</li>
                    <li>Haircuts</li>
                    <li>Nail trimming</li>
                    <li>Ear cleaning</li>
                  </ol>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header p-0" id="headingFour" role="tab">
                <h2 class="mb-0">
                  <button href="#collapseFour" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">
                    <p class="mb-0">What animals do we attend to?</p>
                    <i class="fa" aria-hidden="true"></i>
                  </button>
                </h2>
              </div>
              <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-body py-3 px-0">
                  <p> Domestic animals such as: cats, dogs, small rodents, and some exotic animals</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section testimony-section" style="background-image: url('./assets/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center pb-5 mb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2>Satisfied Clients   &amp; Testimonials</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">My Labrador, Rocky, is a bit anxious, but the veterinary team handles him very well. They always ensure he feels comfortable and secure during visits. The prices are reasonable, and I feel the care we receive is worth every penny. Thank you for taking care of Rocky.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(./assets/images/person_1.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">Carlos Rodríguez</p>
                      <span class="position">Lawyer</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">My little rabbit, Caramelito, is part of the family, and at the veterinary clinic, they treat him as such. The veterinarian always takes the time to address my concerns and has provided me with helpful advice to keep Caramelito healthy. I am grateful for their friendly and professional approach.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(./assets/images/person_2.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">Andrea Martínez</p>
                      <span class="position">Developer</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">The veterinary clinic has been a lifesaver for my dog, Luna. She had an injury in her leg and needed surgery. The team was very professional and careful. They always answered my questions and provided clear instructions for post-care. Luna is recovering well, and that's thanks to them.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(./assets/images/person_3.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">Juan Pérez</p>
                      <span class="position">Baker</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">I am delighted with the care we receive at the veterinary clinic. The staff always treats my cat, Max, with so much affection and patience. From routine check-ups to his surgery, they always keep us informed and reassured. I highly recommend this clinic to all pet owners.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(./assets/images/person_1.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">María González</p>
                      <span class="position">Doctor</span>
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

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center pb-5 mb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2>Promotion deals </h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 ftco-animate">
          <div class="block-7">
            <div class="img" style="background-image: url(./assets/images/pricing-1.jpg);"></div>
            <div class="text-center p-4">
              <span class="excerpt d-block">Basic Plan</span>
              <span class="price"><sup>$</sup> <span class="number">600</span> <sub>/pesos</sub></span>

              <ul class="pricing-text mb-5">
                <li><span class="fa fa-check mr-2"></span>Includes medical service only</li>
                <li><span class="fa fa-check mr-2"></span>4 discount coupons for products monthly.</li>
                
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="block-7">
            <div class="img" style="background-image: url(./assets/images/pricing-2.jpg);"></div>
            <div class="text-center p-4">
              <span class="excerpt d-block">Standard Plan</span>
              <span class="price"><sup>$</sup> <span class="number">900</span> <sub>/pesos</sub></span>

              <ul class="pricing-text mb-5">
                <li><span class="fa fa-check mr-2"></span>Medical service</li>
                <li><span class="fa fa-check mr-2"></span>Aesthetic service</li>
                <li><span class="fa fa-check mr-2"></span>6 discount coupons for products and medications.</li>
                
              </ul>

            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="block-7">
            <div class="img" style="background-image: url(./assets/images/pricing-3.jpg);"></div>
            <div class="text-center p-4">
              <span class="excerpt d-block">Premium Plan</span>
              <span class="price"><sup>$</sup> <span class="number">1200</span> <sub>/pesos</sub></span>

              <ul class="pricing-text mb-5">
                <li><span class="fa fa-check mr-2"></span>Medical service</li>
                <li><span class="fa fa-check mr-2"></span>Aesthetic service</li>
                <li><span class="fa fa-check mr-2"></span>20% discount on all products and medications.</li>
               
              </ul>

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
            <li><a href="#" class="py-1 d-block">Home</a></li>
            <li><a href="./pages/productos.php" class="py-1 d-block">Products</a></li>
            <li><a href="./pages/servicios.php" class="py-1 d-block">Services</a></li>
            <li><a href="./pages/sobrenosotros.php" class="py-1 d-block">About Us</a></li>
            <li><a href="./pages/contactar.php" class="py-1 d-block">Contact Us</a></li>
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