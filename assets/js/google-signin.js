window.onload = function () {
  // Verifica si gapi está cargado correctamente
  if (typeof google === "undefined" || !google.accounts) {
    console.error("Google Identity Services no está cargado");
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

      // Inicializamos Google Sign-In con la nueva API
      google.accounts.id.initialize({
        client_id: clientId,
        callback: handleCredentialResponse, // Callback que maneja la respuesta del usuario
      });

      // Renderizamos el botón de Google Sign-In
      google.accounts.id.renderButton(
        document.getElementById("google-signin-btn"), // ID del contenedor del botón
        { theme: "outline", size: "large" } // Opciones de estilo
      );
    })
    .catch((error) => {
      console.error("Error al obtener el client_id:", error);
    });
};

// Función de callback cuando el usuario inicia sesión
function handleCredentialResponse(response) {
  try {
    // Decodificamos el token JWT (response.credential)
    const user = jwt_decode(response.credential); // Usar la librería jwt-decode
    console.log("Datos del usuario:", user);
    console.log("ID del usuario:", user.sub); // Sub es el ID del usuario
    console.log("Nombre del usuario:", user.name);
    console.log("Email del usuario:", user.email);
    console.log("photo del usuario:", user.picture);
  } catch (error) {
    console.error("Error al decodificar el JWT:", error);
  }
}
