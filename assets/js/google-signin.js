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
      // console.log("Client ID recibido:", clientId);
      console.log("Client ID recibido:");

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
    const user = jwt_decode(response.credential);
    // console.log("Datos del usuario:", user);

    // Mostrar los datos del usuario en SweetAlert2 con imagen visible
    Swal.fire({
      title: `¡Bienvenido, ${user.name}!`,
      icon: "success", // Icono normal de SweetAlert2
      confirmButtonText: "¡Genial!",
      confirmButtonColor: "#4CAF50", // Color verde moderno
      background: "#fefefe",
      color: "#333", // Color del texto
    });
  } catch (error) {
    console.error("Error al decodificar el JWT:", error);

    Swal.fire({
      title: "Error",
      text: "No se pudo obtener la información del usuario.",
      icon: "error", // Icono normal de error
      confirmButtonText: "Cerrar",
      confirmButtonColor: "#d33",
    });
  }
}
