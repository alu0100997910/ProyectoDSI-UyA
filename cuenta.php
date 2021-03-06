<?php
    session_start();
    if(!isset($_SESSION["userid"]))
        header('Location: /404.html');
    include_once 'config/database.php';
    include_once 'models/user.php';
    
    $db = new Database();
    $user = new User($db->getConnection());
    $user->id=$_SESSION['userid'];
    $stmt = $user->getUser();
    $row=mysqli_fetch_assoc($stmt);
    extract($row);
    $user_item=array(
      "id" => $id,
      "name" => $name,
      "lastname" => $lastname,
      "email" => $email,
      "password" => $password,
      "avatar" => $avatar,
      "fechanacimiento" => $fechanacimiento,
      "fechaalta" => $fecharegistro
    );
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="public/css/index.css" type="text/css" />
  <link rel="stylesheet" href="public/css/carrito.css" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cuenta | Hociko's</title>
</head>

<body class="bg-ffc07f">
  <header>
    <nav>
      <div class="nav-wrapper bg-f15156">
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
        <a href="index.php" class="brand-logo valign-wrapper"><img src="assets/img/logo-navbar.png" alt="logo de hocikos" class="nav-logo"/></a>
        <ul class="right hide-on-med-and-down" id="nav-buttons">
          <li><a class="black-text modal-trigger sidenav-close" href="#carrito"><i class="material-icons left">shopping_cart</i> Carrito</a></li>
          <li><a href="cuenta.php" class="black-text"><i class="material-icons left">settings</i>Cuenta</a></li>
          <li><a href="controllers/logout.php" class="black-text"><i class="material-icons left">power_settings_new</i>Desconectar</a></li>
        </ul>
        <ul id="slide-out" class="sidenav">
          <li><div class="container"><img class="responsive-img mt-15" src="assets/img/logo-navbar.png" alt="logo de hocikos"></div></li>
          <li><a class="black-text modal-trigger sidenav-close" href="#carrito"><i class="material-icons left">shopping_cart</i> Carrito</a></li>
          <li><a href="cuenta.php" class="black-text"><i class="material-icons left">settings</i>Cuenta</a></li>
          <li><a href="controllers/logout.php" class="black-text"><i class="material-icons left">power_settings_new</i>Desconectar</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <main class="valign-wrapper">
    <!-- CONTENIDO -->
    <div class="container">
        <div class="row mt-15">
            <div class="col s12 m5 card-panel pb-15">
                <form id="datos">
                    <h1 class="center-align"><i class="material-icons">settings</i> Datos de la cuenta</h1>
                    <div id="alertadatos" role="alert" class="col s10 push-s1" aria-live="polite" hidden></div>
                    <div class="col s12 l6">
                        <div class="input-field">
                            <i class="material-icons prefix">person_outline</i>
                            <input placeholder="<?php echo $user_item['name'] ?>" id="name" type="text">
                            <label class="placeholder" for="name">Nombre</label>
                        </div>
                    </div>
                    <div class="col s12 l6">
                        <div class="input-field">
                            <i class="material-icons prefix">person_outline</i>
                            <input placeholder="<?php echo $user_item['lastname'] ?>" id="lastname" type="text">
                            <label class="placeholder" for="lastname">Apellidos</label>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password">
                            <label class="placeholder" for="password">Nueva Contraseña</label>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="input-field">
                            <i class="material-icons prefix">date_range</i>
                            <?php 
                                if($user_item['fechanacimiento']==null){
                                    echo '<input type="text" id="fechanacimiento" class="datepicker">';
                                } else {
                                    echo '<input type="text" placeholder="'. $user_item['fechanacimiento'] .'" id="fechanacimiento" class="datepicker">';
                                }
                            ?>
                            
                            <label class="placeholder" for="fechanacimiento">Fecha de Nacimiento (yyyy-mm-dd)</label>
                        </div>
                        
                        <button class="btn waves-effect waves-light #2e7d32 green darken-3" type="submit" name="action"><i class="material-icons right">edit</i> Editar</button>
                    </div>
                </form>
            </div>
            <div class="col s12 m5 push-m2 card-panel pb-15">
                <form id="avatar" method="post">
                    <h1 class="center-align"><i class="material-icons">image</i> Avatar</h1>
                    <div id="alertaavatar" role="alert" class="col s10 push-s1" aria-live="polite" hidden></div>
                    <div class="center-align">
                        <?php 
                            if($user_item['avatar']==null){
                                echo '<img id="avatarpic" src="assets/userAvatars/default.png" alt="Foto de perfil">';
                            } else {
                                echo '<img id="avatarpic" src="assets/userAvatars/' . $user_item['avatar'] . '" alt="Foto de perfil">';
                            }
                        ?>
                        
                    </div>
                    <div class="file-field input-field">
                        <div class="btn waves-effect waves-light #2e7d32 green darken-3">
                            <span><i class="material-icons">file_upload</i></span>
                            <input type="file" id="fileToUpload" name="fileToUpload" aria-label="Subir fichero">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" aria-label="Nombre del fichero a subir">
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light #2e7d32 green darken-3" type="submit" name="action"><i class="material-icons right">edit</i> Editar</button>
                </form>
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
  <script type="text/javascript" src="public/js/cuenta.js"></script>
  <script type="text/javascript" src="public/js/navbar.js"></script>
</body>

</html>
