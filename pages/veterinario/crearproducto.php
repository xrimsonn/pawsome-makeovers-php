<?php
require_once "../../config.php";
session_start();

$usuarioIniciadoSesion = false;
if (isset($_SESSION['usuario'])) {
  $usuarioIniciadoSesion = true;
}

// Insertar nuevo producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['accion']) && $_POST['accion'] === 'insertar') {
    $tipoProducto = $_POST['tipo_producto'];
    $typeProduct = $_POST['type_product'];
    $descripcion = $_POST['descripcion'];
    $description = $_POST['descript'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    if ($_FILES["imagen"]["size"] > 5242880) {
      echo "Error: La imagen es demasiado grande. El tamaño máximo permitido es 5 MB.";
    } else {
      $imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

      $stmt = $mysqli->prepare("INSERT INTO productos (tipo_producto, type_product, descripcion, descript, precio, stock, foto) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssis", $tipoProducto, $typeProduct, $descripcion, $description, $precio, $stock, $imagen);

      if ($stmt->execute()) {
        header("location: productos.php");
      } else {
        echo "Error al insertar producto: " . $stmt->error;
      }

      $stmt->close();
    }
  }

}

// Consulta para mostrar productos con imágenes
$sql = "SELECT * FROM productos";
$result = $mysqli->query($sql);

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
    body{
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
            Ingresar registro de Producto
            </h2>
              <p class="card-text text-center">Por favor llena este formulario y envíalo para su almacenamiento.</p>
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="accion" value="insertar">
                <div class="form-group">
                  <label for="tipo_producto">Tipo de Producto:</label>
                  <input type="text" class="form-control" name="tipo_producto" required>
                </div>
                <div class="form-group">
                  <label for="type_product">Type of Product (English):</label>
                  <input type="text" class="form-control" name="type_product" required>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción:</label>
                  <textarea class="form-control" name="descripcion" required></textarea>
                </div>
                <div class="form-group">
                  <label for="description">Description (English):</label>
                  <textarea class="form-control" name="descript" required></textarea>
                </div>
                <div class="form-group">
                  <label for="precio">Precio:</label>
                  <input type="number" class="form-control" name="precio" required>
                </div>
                <div class="form-group">
                  <label for="stock">Stock:</label>
                  <input type="number" class="form-control" name="stock" required>
                </div>
                <div class="form-group">
                  <label for="imagen">Imagen:</label>
                  <input type="file" class="form-control-file" name="imagen" accept="image/*" required>
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



</body>





</html>