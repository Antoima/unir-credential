// google-signin.js

window.onload = function () {
  // Realizamos una solicitud AJAX para obtener el client_id
  fetch("assets/php/config.php")
    .then((response) => response.json())
    .then((data) => {
      const clientId = data.client_id;

      // Verificamos que el client_id fue recibido correctamente
      console.log("Client ID recibido:", clientId);

      // Verificamos si el client_id es válido
      if (!clientId) {
        console.error("El client_id no es válido o está vacío");
        return;
      }

      // Inicializamos Google Sign-In con el client_id recibido
      gapi.load("auth2", function () {
        gapi.auth2.init({
          client_id: clientId, // Usamos el client_id obtenido
        });
        console.log("Google Sign-In inicializado correctamente");
      });
    })
    .catch((error) => {
      console.error("Error al obtener el client_id:", error);
    });
};

// Función que maneja la autenticación de Google
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var userId = profile.getId();
  var userName = profile.getName();
  var userEmail = profile.getEmail();
  console.log("ID: " + userId);
  console.log("Nombre: " + userName);
  console.log("Email: " + userEmail);
}
