window.onload = function () {
  // Verifica si gapi está cargado correctamente
  if (typeof gapi === "undefined") {
    console.error("gapi no está cargado");
    return;
  }

  // Realizamos una solicitud AJAX para obtener el client_id
  fetch("assets/php/config.php")
    .then((response) => response.json())
    .then((data) => {
      const clientId = data.client_id;
      console.log("Client ID recibido:", clientId);

      // Verificamos si el client_id es válido
      if (!clientId) {
        console.error("El client_id no es válido o está vacío");
        return;
      }

      // Asegúrate de que gapi está completamente cargado antes de inicializar
      gapi.load("auth2", function () {
        const auth2 = gapi.auth2.init({
          client_id: clientId, // Usamos el client_id obtenido
        });

        console.log("Google Sign-In inicializado correctamente");

        // Aseguramos que el botón de Google Sign-In esté listo
        auth2.attachClickHandler(
          document.querySelector(".g-signin2"),
          {},
          function (googleUser) {
            onSignIn(googleUser);
          }
        );
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
