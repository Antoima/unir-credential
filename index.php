<?php
// En el backend, asegúrate de tener la variable con el client_id
$client_id = "472435009550-bek0e4bq0lb394f4bu5idjqe9k04b2mm.apps.googleusercontent.com";
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
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    
    <!-- Google Sign-In Initialization -->
    <script>
      window.onload = function () {
        gapi.load('auth2', function () {
          gapi.auth2.init({
            client_id: '<?php echo $client_id; ?>'  // Aquí pasamos el client_id desde PHP
          });
        });
      };
    </script>

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
        <div class="g-signin2" data-onsuccess="onSignIn" ></div>

        <div id="login-box-footer"></div>
        <div id="login-box-foote"></div>
      </div>
    </div>

    <!-- JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/onSignIn.js"></script>
  </body>
</html>

