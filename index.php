<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link rel="stylesheet" href="public/css/index.css" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio</title>
</head>

<body class="bg-ffcf99">
  <?php
  session_start();
  if($_SESSION["logged"]==true){ /* Barra Navegación Logeado*/
    echo ''; /*<li><a class="brown-text modal-trigger sidenav-close" href="#carrito"><i class="material-icons">shopping_cart</i></a></li>*/
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
      <li><div class="container"><img class="responsive-img" src="assets/img/logo-navbar.png"></div></li>
      <li><a href="registro.html" class="black-text"><i class="material-icons left">person</i> Registrate</a></li>
      <li><a href="login.html" class="black-text"><i class="material-icons left">exit_to_app</i>Iniciar Sesion</a></li>
    </ul>';
  }
  
  ?>
  <!-- BARRA DE NAVEGACION Y MOVIL // bg luci: #ffe082 amber lighten-3 -->
  


  <!-- CONTENIDO -->
  <div class="container">
    <div class="row">
      <div class="col s12 m4">
        <div class="section">
          <h1>Categorias:</h1>
          <div class="collection">
            <a href="#" class="collection-item center-align #fff8e1 amber lighten-5 black-text active"></span>Alimentos</a>
            <a href="#" class="collection-item center-align #fff8e1 amber lighten-5 black-text"></span>Juguetes y accesorios</a>
            <a href="#" class="collection-item center-align #fff8e1 amber lighten-5 black-text"></span>Casetas</a>
            <a href="#" class="collection-item center-align #fff8e1 amber lighten-5 black-text"></span>Baño</a>
          </div>
        </div>
        <div class="divider"></div>
        <div class="section">
          <h1>Precio:</h1>
          <div class="collection">
            <a href="#" class="collection-item center-align #fff8e1 amber lighten-5 black-text active"></span>5 - 20 €</a>
            <a href="#" class="collection-item center-align #fff8e1 amber lighten-5 black-text"></span>20 - 40 €</a>
            <a href="#" class="collection-item center-align #fff8e1 amber lighten-5 black-text"></span>40 - 60 €</a>
            <a href="#" class="collection-item center-align #fff8e1 amber lighten-5 black-text"></span>60 - 80 €</a>
          </div>
        </div>
        <div class="divider"></div>
        <div class="section">
          <div class="card bg-721121">
            <div class="card-content white-text">
              <span class="card-title"> Descubre nuestras ofertas!</span>
            </div>
            <form class="bg-f15156">
              <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix" data-error="wrong" data-success="right" class="form-text black-text">Nombre, usuario o telefono</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input id="icon_prefix" type="email" class="validate">
                <label for="icon_prefix" class="form-text black-text">Correo electrónico</label>
              </div>
              <button class="btn waves-effect waves-light #424242 grey darken-3" name="action">Suscribirse</button>
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
          <div class="section">
            <h1>Productos:</h1>
            <div class="col s12 m6 l4">
              <div class="card #fff8e1 amber lighten-5">
                <div class="card-image ">
                  <img src="ipad.jpg">
                </div>
                <div class="card-content">
                  <span class="card-title">Card Title <span class="new badge blue price-tag" data-badge-caption="€">1200</span></span>
                  <p class="truncate">I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                  <div class="center-align info-button">
                    <a class="waves-effect waves-light btn-small blue"><i class="material-icons right">info</i>Info</a>
                  </div>

                </div>
                <div class="card-action center-align">
                  <a onClick="add(this)" class="waves-effect waves-light btn-small red"><i class="material-icons right">add_shopping_cart</i>Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col s12 m6 l4">
              <div class="card #fff8e1 amber lighten-5">
                <div class="card-image">
                  <img src="ipad.jpg">
                </div>
                <div class="card-content">
                  <span class="card-title">Card Title <span class="new badge blue price-tag" data-badge-caption="€">1200</span></span>
                  <p class="truncate">I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                  <div class="center-align info-button">
                    <a class="waves-effect waves-light btn-small blue"><i class="material-icons right">info</i>Info</a>
                  </div>

                </div>
                <div class="card-action center-align">
                  <a onClick="add(this)" class="waves-effect waves-light btn-small red"><i class="material-icons right">add_shopping_cart</i>Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col s12 m6 l4">
              <div class="card #fff8e1 amber lighten-5">
                <div class="card-image">
                  <img src="ipad.jpg">
                </div>
                <div class="card-content">
                  <span class="card-title">Card Title <span class="new badge blue price-tag" data-badge-caption="€">1200</span></span>
                  <p class="truncate">I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                  <div class="center-align info-button">
                    <a class="waves-effect waves-light btn-small blue"><i class="material-icons right">info</i>Info</a>
                  </div>

                </div>
                <div class="card-action center-align">
                  <a onClick="add(this)" class="waves-effect waves-light btn-small red"><i class="material-icons right">add_shopping_cart</i>Add To Cart</a>
                </div>
              </div>
            </div>

            <div class="center-align">
              <ul class="pagination">
                <li class="disabled"><a href="#"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li class="waves-effect"><a href="#">2</a></li>
                <li class="waves-effect"><a href="#">3</a></li>
                <li class="waves-effect"><a href="#">4</a></li>
                <li class="waves-effect"><a href="#">5</a></li>
                <li class="waves-effect"><a href="#"><i class="material-icons">chevron_right</i></a></li>
              </ul>
            </div>

          </div>
        </div>


      </div>
    </div>
  </div>

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
    <div id="footer-copyright" class="black-text">
      © 2018 HOCIKO'S.com Todos los derechos reservados Política de privacidad Política de cookies Condiciones de uso
    </div>
  </footer>

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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script type="text/javascript" src="public/js/materialize-init.js"></script>
  <script type="text/javascript" src="public/js/index.js"></script>
</body>

</html>
