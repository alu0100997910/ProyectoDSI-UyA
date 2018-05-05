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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header>
        <!-- NAVBAR -->
        <?php
        session_start();
        if(isset($_SESSION["userid"])){ /* Barra Navegación Logeado*/
          echo '<nav>
            <div class="nav-wrapper bg-f15156">
              <a href="index.php" class="brand-logo valign-wrapper"><img src="assets/img/logo-navbar.png" alt="logo de hocikos" class="nav-logo"/></a>
              <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons brown-text">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li><a class="black-text modal-trigger sidenav-close" href="#carrito"><i class="material-icons left">shopping_cart</i> Carrito</a></li>
                <li><a href="#" class="black-text"><i class="material-icons left">settings</i>Cuenta</a></li>
                <li><a href="controllers/logout.php" class="black-text"><i class="material-icons left">power_settings_new</i>Desconectar</a></li>
              </ul>
            </div>
          </nav>
          <ul id="slide-out" class="sidenav">
            <li><div class="container"><img class="responsive-img mt-15" src="assets/img/logo-navbar.png"></div></li>
            <li><a class="black-text modal-trigger sidenav-close" href="#carrito"><i class="material-icons left">shopping_cart</i> Carrito</a></li>
            <li><a href="#" class="black-text"><i class="material-icons left">settings</i>Cuenta</a></li>
            <li><a href="controllers/logout.php" class="black-text"><i class="material-icons left">power_settings_new</i>Desconectar</a></li>
          </ul>'; /**/
        }
        else { /*Barra Navegacion Deslogeado*/  
          echo '
            <nav>
              <div class="nav-wrapper bg-f15156">
                <a href="index.php" class="brand-logo valign-wrapper"><img src="assets/img/logo-navbar.png" alt="logo de hocikos" class="nav-logo"/></a>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons brown-text">menu</i></a>
                <ul class="right hide-on-med-and-down">
                  <li><a href="registro.html" class="black-text"><i class="material-icons left">person</i>Registrate</a></li>
                  <li><a href="login.html" class="black-text"><i class="material-icons left">exit_to_app</i>Iniciar Sesion</a></li>
                </ul>
              </div>
            </nav>
            <ul id="slide-out" class="sidenav">
              <li><div class="container"><img class="responsive-img mt-15" alt="logo de hocikos" src="assets/img/logo-navbar.png"></div></li>
              <li><a href="registro.html" class="black-text"><i class="material-icons left">person</i> Registrate</a></li>
              <li><a href="login.html" class="black-text"><i class="material-icons left">exit_to_app</i>Iniciar Sesion</a></li>
            </ul>';
        }
        ?>
    </header>
    <main class="valign-wrapper">
        <div class="container">
            <div class="row hide-on-large-only center-align">
                <div id="product-image" class="col s7 m6 push-s2 push-m3">
                    <img class="materialboxed responsive-img" src="/assets/img/champu.jpeg">
                </div>
                <div class="col s12 l7">
                    <div class="collection">
                        <h1 class="collection-item flow-text">Product Title<span class="new badge blue" data-badge-caption="€">1200</span></h1>
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
                                    <td id="modelo">Ipad Pro 10''</td>
                                    <td id="descripcion">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. <br> Donec id elit non mi porta gravida at eget metus.</td>
                                    <td id="stock">4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="divider"></div>
                    <div class="section center-align">
                        <a class="waves-effect waves-light btn-small #b71c1c red darken-4">ADD TO CART</a>
                    </div>
                </div>
            </div>

            <div class="row hide-on-med-and-down valign-wrapper">
                <div id="product-image" class="col l6">
                    <img class="materialboxed responsive-img" src="/assets/img/champu.jpeg">
                </div>
                <div class="col s12 l6">
                    <div class="collection">
                        <h1 class="collection-item flow-text">Product Title <span class="new badge blue" data-badge-caption="€">1200</span></h1>
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
                                    <td>Ipad Pro 10''</td>
                                    <td>
                                        <p>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. <br> Donec id elit non mi porta gravida at eget metus.</p>
                                    </td>
                                    <td>4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="divider"></div>
                    <div class="section center-align">
                        <a class="waves-effect waves-light btn-small #b71c1c red darken-4">ADD TO CART</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- IMPLEMENTACION CARRITO -->
        <div id="carrito" class="modal">
            <div class="modal-content">
                <h1>Carrito: <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat right"><i class="material-icons">close</i></a></h1>

                <ul class="collection">
                    <li class="collection-item avatar valign-wrapper">
                        <img src="ipad.jpg" alt="" class="circle">
                        <span class="title">Product Title</span>
                        <a href="#" class="secondary-content"><i class="material-icons">remove_shopping_cart</i></a>
                    </li>
                    <li class="collection-item avatar valign-wrapper">
                        <img src="ipad.jpg" alt="" class="circle">
                        <span class="title">Product Title</span>
                        <a href="#" class="secondary-content"><i class="material-icons">remove_shopping_cart</i></a>
                    </li>
                </ul>
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
                    <h2 class="white-text">Atencion al cliente</h2>
                    <ul>
                        <li>
                            <a href="#">Contacta con nosotros</a>
                        </li>
                        <li>
                            <a href="#">Devoluciones</a>
                        </li>
                        <li>
                            <a href="#">Soluciones tecnicas</a>
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

</body>

</html>