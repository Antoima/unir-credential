<?php
// En el backend, asegúrate de tener la variable con el client_id

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>WebAndroid</title>

    <!-- CSS Links -->
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/Login-Box-En.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- External JS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script> <!-- Nueva biblioteca -->
    
<!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  
    <!-- jwt inicializacion -->
    <script src="https://cdn.jsdelivr.net/npm/jwt-decode@3.1.2/build/jwt-decode.min.js"></script>

    <!-- Google Sign-In JS Initialization -->
    <script src="assets/js/google-signin.js" defer></script>



  </head>

  <body>
    <div class="loaders" id="loaders"></div>

    <div class="d-flexx flex-columnn justify-content-centerr fr" id="login-box">
      <div class="frr">
        <div class="login-box-heade"></div>
        <div class="login-box-heade"></div>
        <div class="email-login">
          <input type="text" class="password-input form-control" required placeholder="Nombre completo" minlength="6" maxlength="200" name="nombre" id="nombre" autofocus inputmode="latin-name" />
          <input type="email" class="password-input form-control" required placeholder="Correo" minlength="12" maxlength="200" name="correo" id="correo" inputmode="email" onblur="isValidEmail(value)" />
        </div>
        <div class="submit-row">
          <button class="btn btn-primary btn-block box-shadow frb" id="sub" type="submit" onclick="datos();">Generar</button>
        </div>

        <!-- Botón Google Sign-In -->
        <div id="google-signin-btn"></div> <!-- Actualización: lugar para el botón -->

        <div id="login-box-footer"></div>
        <div id="login-box-foote"></div>
      </div>
    </div>

    <!-- JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
