<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link rel="stylesheet" href="public/css/index.css" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio | Hociko's</title>
</head>

<body class="bg-ffc07f">
  <header>
    <?php
    session_start();
    if(isset($_SESSION["userid"])){ /* Barra Navegación Logeado*/
      echo '<nav>
        <div class="nav-wrapper bg-f15156">
          <a href="index.php" class="brand-logo valign-wrapper"><img src="assets/img/logo-navbar.png" alt="logo de hocikos" class="nav-logo"/></a>
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons brown-text">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a class="black-text modal-trigger sidenav-close" href="#carrito"><i class="material-icons left">shopping_cart</i> Carrito</a></li>
            <li><a href="cuenta.php" class="black-text"><i class="material-icons left">settings</i>Cuenta</a></li>
            <li><a href="controllers/logout.php" class="black-text"><i class="material-icons left">power_settings_new</i>Desconectar</a></li>
          </ul>
        </div>
      </nav>
      <ul id="slide-out" class="sidenav">
        <li><div class="container"><img class="responsive-img mt-15" src="assets/img/logo-navbar.png"></div></li>
        <li><a class="black-text modal-trigger sidenav-close" href="#carrito"><i class="material-icons left">shopping_cart</i> Carrito</a></li>
        <li><a href="cuenta.php" class="black-text"><i class="material-icons left">settings</i>Cuenta</a></li>
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
    <!-- CONTENIDO -->
    <div class="container">
      <div class="row">
        <div class="col s12 m4">
          <div class="section">
            <h1>Categorias:</h1>
            <ul id="category" class="collection center-align">
              <li class="collection-item black-text selected" value=0>Todos</li>
              <li class="collection-item black-text" value=1>Alimentos</li>
              <li class="collection-item black-text" value=2>Juguetes y accesorios</li>
              <li class="collection-item black-text" value=3>Casetas</li>
              <li class="collection-item black-text" value=4>Baño</li>
            </ul>
          </div>
          <div class="divider"></div>
          <div class="section">
            <h1>Precio:</h1>
            <ul id="price" class="collection center-align">
              <li class="collection-item black-text selected" value=0>Todos</li>
              <li class="collection-item black-text" value=1>5 - 20 €</li>
              <li class="collection-item black-text" value=2>20 - 40 €</li>
              <li class="collection-item black-text" value=3>40 - 60 €</li>
              <li class="collection-item black-text" value=4>60 - 80 €</li>
            </ul>
          </div>
          <div class="divider"></div>
          <div class="section">
            <div class="card bg-721121">
              <div class="card-content white-text">
                <span class="card-title"> Descubre nuestras ofertas!</span>
              </div>
              <form id="boletin" class="bg-f15156 pb-15">
                <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="name" name="name" type="text" class="validate">
                  <label for="name" data-error="wrong" data-success="right" class="form-text black-text">Nombre, usuario o telefono</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="email" type="email" name="email" class="validate">
                  <label for="email" class="form-text black-text">Correo electrónico</label>
                </div>
                <button class="btn waves-effect waves-light #424242 grey darken-3" type="submit">Suscribirse</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col s12 m8">
          <div class="row">
            <div class="section">
              <h1>Ofertas:</h1>
              <div class="slider col s12">
                <ul class="slides">
                  <li>
                    <img src="assets/img/alimentos.jpg" alt="perro saboreando pienso">
                    <div class="caption center-align">
                      <h3>Las mejores ofertas en pienso, croquetas y demas!</h3>
                    </div>
                  </li>
                  <li>
                    <img src="assets/img/toys.jpg" alt="foto de perro con juguetes">
                    <div class="caption left-align">
                      <h3>Aquí encontrarás los mejores juguetes y accesorios para tu mascota</h3>
                    </div>
                  </li>
                  <li>
                    <img src="assets/img/caseta.jpg" alt="perros en una caseta">
                    <div class="caption right-align">
                      <h3>Casetas en oferta!</h3>
                    </div>
                  </li>
                  <li>
                    <img src="assets/img/baño.jpg" alt="perros en una bañera">
                    <div class="caption center-align">
                      <h3>Los mejores productos de baño para tu mascota</h3>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="divider"></div>
            <div class="section" id="product-list">
              
              
              
            </div>
            <div class="section">
              <div class="col s12">
                <div class="center-align">
                  <ul class="pagination">
                    
                  </ul>
                </div>
              </div>
            </div>
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
  

  <!-- FOOTER // bg luci: #ffa726 orange lighten-1 -->
  
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
  <script type="text/javascript" src="public/js/index.js"></script>
  <script type="text/javascript" src="public/js/carrito.js"></script>
</body>

</html>
