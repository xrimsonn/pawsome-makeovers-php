<?php
require_once "../../config.php";
session_start();

$usuarioIniciadoSesion = false;
if (isset($_SESSION['usuario'])) {
  $usuarioIniciadoSesion = true;
}

// Define variables and initialize with empty values
$tipoProducto = $typeProduct = $descripcion = $descript = $precio = $stock = "";
$tipoProducto_err = $typeProduct_err = $descripcion_err = $descript_err = $precio_err = $stock_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate tipo de producto
    $input_tipoProducto = trim($_POST["tipo_producto"]);
    if (empty($input_tipoProducto)) {
        $tipoProducto_err = "Por favor ingrese un tipo de producto.";
    } else {
        $tipoProducto = $input_tipoProducto;
    }

    // Validate type_product
    $input_typeProduct = trim($_POST["type_product"]);
    if (empty($input_typeProduct)) {
        $typeProduct_err = "Please enter a product type.";
    } else {
        $typeProduct = $input_typeProduct;
    }

    // Validate descripción
    $input_descripcion = trim($_POST["descripcion"]);
    if (empty($input_descripcion)) {
        $descripcion_err = "Por favor ingrese una descripción.";
    } else {
        $descripcion = $input_descripcion;
    }

    // Validate descript
    $input_descript = trim($_POST["descript"]);
    if (empty($input_descript)) {
        $descript_err = "Please enter a description.";
    } else {
        $descript = $input_descript;
    }

    // Validate precio
    $input_precio = trim($_POST["precio"]);
    if (empty($input_precio)) {
        $precio_err = "Por favor ingrese un precio.";
    } elseif (!ctype_digit($input_precio)) {
        $precio_err = "Por favor ingrese un valor numérico positivo.";
    } else {
        $precio = $input_precio;
    }

    // Validate stock
    $input_stock = trim($_POST["stock"]);
    if (empty($input_stock)) {
        $stock_err = "Por favor ingrese el stock.";
    } elseif (!ctype_digit($input_stock)) {
        $stock_err = "Por favor ingrese un valor numérico positivo.";
    } else {
        $stock = $input_stock;
    }

    // Check input errors before updating in database
    if (empty($tipoProducto_err) && empty($typeProduct_err) && empty($descripcion_err) && empty($descript_err) && empty($precio_err) && empty($stock_err)) {
        // Prepare an update statement
        $sql = "UPDATE productos SET tipo_producto=?, type_product=?, descripcion=?, descript=?, precio=?, stock=? WHERE id_productos=?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssiii", $param_tipoProducto, $param_typeProduct, $param_descripcion, $param_descript, $param_precio, $param_stock, $param_id);

            // Set parameters
            $param_tipoProducto = $tipoProducto;
            $param_typeProduct = $typeProduct;
            $param_descripcion = $descripcion;
            $param_descript = $descript;
            $param_precio = $precio;
            $param_stock = $stock;
            $param_id = $_POST["id_productos"];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records updated successfully. Redirect to landing page
                header("location: productos.php");
                exit();
            } else {
                echo "Oops! Algo salió mal. Por favor, intente más tarde.";
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $mysqli->close();
    }
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM productos WHERE id_productos = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    // Retrieve individual field values
                    $tipoProducto = $row["tipo_producto"];
                    $typeProduct = $row["type_product"];
                    $descripcion = $row["descripcion"];
                    $descript = $row["descript"];
                    $precio = $row["precio"];
                    $stock = $row["stock"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Algo salió mal. Por favor, intente más tarde.";
            }
        }

        // Close statement
        $stmt->close();

        // Close connection
        $mysqli->close();
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
    <link rel="shortcut icon" type="image/png" href="../../assets/images/huellita.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
      <a href="./updateproduct.php">
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


    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card card-body">
                <h2 class="text-center mb-4" style="color: #576ca8; font-family:inherit; font-weight:600;"> Actualizar producto</h2>
                <p>Por favor actualice los datos del producto.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Tipo de Producto</label>
                        <input type="text" name="tipo_producto" class="form-control <?php echo (!empty($tipoProducto_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tipoProducto; ?>">
                        <span class="invalid-feedback"><?php echo $tipoProducto_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Type of Product (English)</label>
                        <input type="text" name="type_product" class="form-control <?php echo (!empty($typeProduct_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $typeProduct; ?>">
                        <span class="invalid-feedback"><?php echo $typeProduct_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" name="descripcion" class="form-control <?php echo (!empty($descripcion_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $descripcion; ?>">
                        <span class="invalid-feedback"><?php echo $descripcion_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Description (English)</label>
                        <input type="text" name="descript" class="form-control <?php echo (!empty($descript_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $descript; ?>">
                        <span class="invalid-feedback"><?php echo $descript_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" name="precio" class="form-control <?php echo (!empty($precio_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $precio; ?>">
                        <span class="invalid-feedback"><?php echo $precio_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="stock" class="form-control <?php echo (!empty($stock_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $stock; ?>">
                        <span class="invalid-feedback"><?php echo $stock_err; ?></span>
                    </div>
                    <input type="hidden" name="id_productos" value="<?php echo $id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <a href="productos.php" class="btn btn-secondary ml-2">Cancelar</a>
                </form>
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
