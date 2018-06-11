<?php
    if(!(isset($_GET['id']) && $_GET['id']!=null)){
        header('Location: /404.html');
    } else {
        include_once "config/database.php";
        include_once "models/product.php";
        
        $db = new Database();
        $product = new Product($db->getConnection());
        $product->id = $_GET['id'];
        $stmt = $product->getProduct();
        $num = $stmt->num_rows;
        
        if($num > 0){
            $row=mysqli_fetch_assoc($stmt);
            extract($row);
        }
        
        else {
            header('Location: /404.html');
        }
        
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Producto | Hociko's</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="/public/css/producto.css" type="text/css" />
    <link rel="stylesheet" href="/public/css/index.css" type="text/css" />
    <link rel="stylesheet" href="public/css/carrito.css" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-ffcf99">
    <header>
    <?php
    session_start();
    if(isset($_SESSION["userid"])){ /* Barra Navegación Logeado*/
      echo '<nav>
        <div class="nav-wrapper bg-f15156">
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
          <a href="index.php" class="brand-logo valign-wrapper"><img src="assets/img/logo-navbar.png" alt="logo de hocikos" class="nav-logo"/></a>
          <ul class="right hide-on-med-and-down" id="nav-buttons">
            <li><a class="black-text modal-trigger sidenav-close" href="#carrito"><i class="material-icons left">shopping_cart</i> Carrito</a></li>
            <li><a href="cuenta.php" class="black-text"><i class="material-icons left">settings</i>Cuenta</a></li>
            <li><a href="controllers/logout.php" class="black-text"><i class="material-icons left">power_settings_new</i>Desconectar</a></li>
          </ul>
          <ul id="slide-out" class="sidenav">
            <li><div class="container"><img class="responsive-img mt-15" src="assets/img/logo-navbar.png"></div></li>
            <li><a class="black-text modal-trigger sidenav-close" href="#carrito"><i class="material-icons left">shopping_cart</i> Carrito</a></li>
            <li><a href="cuenta.php" class="black-text"><i class="material-icons left">settings</i>Cuenta</a></li>
            <li><a href="controllers/logout.php" class="black-text"><i class="material-icons left">power_settings_new</i>Desconectar</a></li>
          </ul>
        </div>
      </nav>'; /**/
    }
    
    else { /*Barra Navegacion Deslogeado*/  
      echo '
      <nav>
        <div class="nav-wrapper bg-f15156">
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
          <a href="index.php" class="brand-logo valign-wrapper"><img src="assets/img/logo-navbar.png" alt="logo de hocikos" class="nav-logo"/></a>
          <ul class="right hide-on-med-and-down" id="nav-buttons">
            <li><a href="registro.html" class="black-text"><i class="material-icons left">person</i>Regístrate</a></li>
            <li><a href="login.html" class="black-text"><i class="material-icons left">exit_to_app</i>Iniciar Sesión</a></li>
          </ul>
          <ul id="slide-out" class="sidenav show-on-medium-and-down">
            <li><div class="container"><img class="responsive-img mt-15" alt="logo de hocikos" src="assets/img/logo-navbar.png"></div></li>
            <li><a href="registro.html" class="black-text"><i class="material-icons left">person</i> Regístrate</a></li>
            <li><a href="login.html" class="black-text"><i class="material-icons left">exit_to_app</i>Iniciar Sesión</a></li>
          </ul>
        </div>
      </nav>';
    }
    
    ?>
    </header>
    <main class="valign-wrapper">
        <div class="container">
            <div class="row hide-on-large-only center-align">
                <div class="col s7 m6 push-s2 push-m3 mt-15 product-image-id">
                    <img class="materialboxed responsive-img" src="<?php echo "/assets/products/$img"; ?>" alt="<?php echo $alt; ?>">
                </div>
                <div class="col s12 l7">
                    <div class="collection">
                        <h1 class="collection-item flow-text bg-ffcf99"><?php echo $name; ?><span class="new badge #1976d2 blue darken-2 bold" data-badge-caption="€"><?php echo $price; ?></span></h1>
                    </div>

                    <div class="divider"></div>
                    <div class="row">
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Modelo</th>
                                    <th>Descripción</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $modelo; ?></td>
                                    <td><?php echo $desc; ?></td>
                                    <td><?php echo $stock; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="divider"></div>
                    <div class="section center-align">
                        <a class="waves-effect waves-light btn-small #b71c1c red darken-4"><i class="material-icons right">add_shopping_cart</i>Añadir al Carrito</a>
                    </div>
                </div>
            </div>

            <div class="row hide-on-med-and-down valign-wrapper">
                <div class="col l6 product-image-id">
                    <img class="materialboxed responsive-img" src="<?php echo "/assets/products/$img"; ?>" alt="<?php echo $alt; ?>">
                </div>
                <div class="col s12 l6">
                    <div class="collection">
                        <h1 class="collection-item flow-text bg-ffcf99"><?php echo $name; ?><span class="new badge #1976d2 blue darken-2 bold" data-badge-caption="€"><?php echo "$price"; ?></span></h1>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Modelo</th>
                                    <th>Descripción</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $modelo; ?></td>
                                    <td><?php echo $desc; ?></td>
                                    <td><?php echo $stock; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="divider"></div>
                    <div class="section center-align">
                        <button onClick="addToCart(<?php echo $id ?>)" class="waves-effect waves-light btn-small #d32f2f red darken-2"><i class="material-icons right">add_shopping_cart</i>Añadir al Carrito</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- IMPLEMENTACION CARRITO -->
        <div id="carrito" class="modal" role="dialog">
            <div class="modal-content">
                <h1>Carrito: <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat right"><i class="material-icons">close</i></a></h1>
                <div id="order-alert" class="col s10 push-s1" role="alert" aria-live="polite" hidden></div>
                <ul class="collection"></ul>
                <div class="center-align">
                    <button id="order" class="waves-effect waves-light btn"><i class="material-icons left">payment</i>Realizar Pedido</button>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->

    <footer class="page-footer bg-a5402d">
        <div class="container">
            <div class="row">
                <div class="col l6 s6">
                    <h2 class="white-text">Accede a nuestras redes sociales</h2>
                    <a href="#">Facebook</a>
                    <img class="circle responsive-img social-icon" alt="Logo de facebook" src="assets/img/facebook.png">
                    <br>
                    <br>
                    <a href="#">Twitter</a>
                    <img class="circle responsive-img social-icon" alt="Logo de twitter" src="assets/img/twitter.jpg">
                </div>
                <div class="col l4 offset-l2 s6">
                    <h2 class="white-text">Atención al cliente</h2>
                    <ul>
                        <li>
                            <a href="#">Contacta con nosotros</a>
                        </li>
                        <li>
                            <a href="#">Devoluciones</a>
                        </li>
                        <li>
                            <a href="#">Soluciones técnicas</a>
                        </li>
                        <li>
                            <a href="#">Preguntas frecuentes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="footer-copyright" class="white-text">
            © 2018 HOCIKO'S.com Todos los derechos reservados Política de privacidad Política de cookies Condiciones de uso
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script type="text/javascript" src="public/js/materialize-init.js"></script>
    <script type="text/javascript" src="public/js/carrito.js"></script>
    <script type="text/javascript" src="public/js/navbar.js"></script>

</body>

</html>
