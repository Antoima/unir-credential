// JavaScript code for form validation and AJAX request
function isValidEmail(email) {
  var boton = document.getElementById("sub");
  boton.disabled = true;

  var re =
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var result = re.test(email);

  if (result == true) {
    boton.disabled = false;
  } else {
    boton.disabled = true;
  }
}

function mostrarCarga() {
  document.getElementById("loaders").style.display = "block";
}

function ocultarCarga() {
  document.getElementById("loaders").style.display = "none";
}

function muestraMensajeInfo() {
  new Noty({
    text: "Preparando todo lo necesario",
    type: "info",
    layout: "topRight",
    timeout: 3000,
  }).show();
}

function muestraMensajeSuccess() {
  new Noty({
    text: "CredencialOK",
    type: "info",
    layout: "topRight",
    timeout: 3000,
  }).show();
}

function datos() {
  var name = document.getElementById("nombre").value;
  var email = document.getElementById("correo").value;

  if (name.length > 3 && email.length > 11) {
    $.ajax({
      url: "https://unircredencial.com.ar/p1/correoB.php",
      type: "post",
      cache: "false",
      data: "correo=" + email + "&nombre=" + name,
      beforeSend: function () {
        mostrarCarga();
      },
      success: function (resultado) {
        var nombre = resultado.nombre;
        var estados = resultado.estado;
        cifrarDatos(name, email);
        if (estados == "true") {
          window.location.replace(
            "https://unircredencial.com.ar/p1/index.html?id=" +
              nombreCifrado +
              "&id2=" +
              correoCifrado
          );
        } else {
          alert("Algo salió mal, intente nuevamente: " + nombre);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        ocultarCarga();

        if (jqXHR.status === 0) {
          alert("Not connect: Verify Network.");
        } else if (jqXHR.status == 404) {
          alert("Requested page not found [404]");
        } else if (jqXHR.status == 500) {
          alert("Internal Server Error [500].");
        } else if (textStatus === "parsererror") {
          alert("Requested JSON parse failed.");
        } else if (textStatus === "timeout") {
          alert("Time out error.");
        } else if (textStatus === "abort") {
          alert("Ajax request aborted.");
        } else {
          alert("Uncaught Error: " + jqXHR.responseText);
        }
      },
    });
  }
}
