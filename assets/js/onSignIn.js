// Esta función se ejecutará cuando el usuario haya iniciado sesión con Google
function onSignIn(googleUser) {
  // Obtener el perfil del usuario
  var profile = googleUser.getBasicProfile();
  var userId = profile.getId(); // El ID de usuario de Google
  var userName = profile.getName(); // El nombre completo del usuario
  var userEmail = profile.getEmail(); // El correo electrónico del usuario

  // Puedes usar esta información para hacer algo con el backend o mostrarla en el frontend
  console.log("ID: " + userId);
  console.log("Nombre: " + userName);
  console.log("Email: " + userEmail);

  // Puedes ahora enviar estos datos al backend para validar la autenticación o crear una sesión en tu sistema
  // Por ejemplo:
  // fetch('/your-backend-endpoint', {
  //   method: 'POST',
  //   body: JSON.stringify({
  //     id: userId,
  //     name: userName,
  //     email: userEmail
  //   }),
  //   headers: { 'Content-Type': 'application/json' }
  // });
}
