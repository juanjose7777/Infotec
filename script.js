async function SelectCiu() {
  let selectCiudad = document.getElementById("Ciudad");

  var Pais = $("#Pais").val();
  if (Pais === "") {
    selectCiudad.innerHTML = "";
    return;
  }
  let formData = new FormData();
  formData.append("funcion", "SelectCiu");
  formData.append("Pais", Pais);

  try {
    let req2 = await fetch("controller/LandingController.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    if (res2) {
      selectCiudad.innerHTML = "";

      res2.forEach((ciudad) => {
        let option = document.createElement("option");
        option.value = ciudad.idCiudad;
        option.textContent = ciudad.CiuNombre;
        selectCiudad.appendChild(option);
      });
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      text: "Error en el sistema",
    });
  }
}
async function SearchInfo() {
  var Pais = $("#Pais").val();
  var Ciudad = $("#Ciudad").val();
  if (Pais === "" || Ciudad === "") {
    Swal.fire({
      icon: "info",
      text: "Los campos Pais y Ciudad Son Obligatorios",
    });
    return;
  }

  let formData = new FormData();
  formData.append("funcion", "GetInfo");
  formData.append("Pais", Pais);
  formData.append("Ciudad", Ciudad);
  try {
    let req2 = await fetch("controller/LandingController.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.text();
    if (res2) {
      $("#respond").html(res2);
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      text: "Error en el sistema",
    });
  }
}
function formatoConComas(input) {
  let valor = input.value.replace(/[^\d]/g, ""); // Eliminamos todos los caracteres no numéricos

  // Si hay un cero al principio, pero el número es mayor a cero, eliminamos el cero
  if (valor.length > 1 && valor[0] === "0") {
    valor = valor.slice(1);
  }

  // Insertamos comas cada tres dígitos desde el final de la cadena
  let valorFormateado = "";
  let startIndex = valor.length % 3 || 3;
  valorFormateado = valor.slice(0, startIndex);
  while (startIndex < valor.length) {
    valorFormateado += "," + valor.slice(startIndex, startIndex + 3);
    startIndex += 3;
  }

  input.value = valorFormateado;
}
async function InfoDetalle(idCiudad) {
  var Presupuesto = $("#Presupuesto").val();
  var userse = $("#userse").val();

  if (Presupuesto === "") {
    Swal.fire({
      icon: "info",
      text: "El Campo de presupuesto es obligatorio",
    });
    return;
  }

  var PresupuestoNumerico = Presupuesto.replace(/,/g, "");
  PresupuestoNumerico = parseFloat(PresupuestoNumerico);

  let formData = new FormData();
  formData.append("funcion", "InfoDetalle");
  formData.append("Presupuesto", PresupuestoNumerico);
  formData.append("idCiudad", idCiudad);
  formData.append("userse", userse);
  try {
    let req2 = await fetch("controller/LandingController.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.text();
    if (res2) {
      $("#respond").html(res2);
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      text: "Error en el sistema",
    });
  }
}

async function NewRegistro() {
  var Nombres = $("#Nombres").val();
  var Apellidos = $("#Apellidos").val();
  var Usuario = $("#Usuario").val();
  var Contrasena = $("#Contrasena").val();
  var Sexo = $("#Sexo").val();
  var Telefono = $("#Telefono").val();
  if (
    Nombres === "" ||
    Apellidos === "" ||
    Usuario === "" ||
    Contrasena === "" ||
    Sexo === "" ||
    Telefono === ""
  ) {
    Swal.fire({
      icon: "info",
      text: "Todos los campos son obligatorios",
    });
    return;
  }
  let formData = new FormData();
  formData.append("funcion", "NewRegistro");
  formData.append("Nombres", Nombres);
  formData.append("Apellidos", Apellidos);
  formData.append("Usuario", Usuario);
  formData.append("Contrasena", Contrasena);
  formData.append("Sexo", Sexo);
  formData.append("Telefono", Telefono);
  try {
    let req2 = await fetch("controller/InicioController.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    if (res2) {
      if (res2.cod === 1) {
        Swal.fire({
          icon: "success",
          text: "Usuario registrado exitosamente",
        });
        LimpiarCampos();
      } else {
        Swal.fire({
          icon: "info",
          text: "Usuario ya existente",
        });
      }
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      text: "Error en el sistema",
    });
  }
}
function LimpiarCampos() {
  $("#Nombres").val("");
  $("#Apellidos").val("");
  $("#Usuario").val("");
  $("#Contrasena").val("");
  $("#Sexo").val("");
  $("#Telefono").val("");
}
async function iniciarSesion() {
  var User = $("#User").val();
  var Pass = $("#Pass").val();

  if (User === "" || Pass === "") {
    Swal.fire({
      icon: "info",
      text: "Todos los campos son obligatorios",
    });
    return;
  }
  let formData = new FormData();
  formData.append("funcion", "iniciarSesion");
  formData.append("User", User);
  formData.append("Pass", Pass);
  try {
    let req2 = await fetch("controller/InicioController.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    if (res2) {
      if (res2.cod === 1) {
        Swal.fire({
          icon: "success",
          text: "Bienvenido " + res2.User,
        });
        setTimeout(function () {
          location.reload();
        }, 2000);
      } else {
        Swal.fire({
          icon: "error",
          text: "Credenciales Incorrectas",
        });
      }
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      text: "Error en el sistema",
    });
  }
}
async function SavePresupuesto(idCiudad) {
  var PresuCOP = $("#PresuCOP").val();
  var ValorLocal = $("#ValorNuevo").html();
  var PresupuestoNumerico = ValorLocal.replace(/\./g, "");
  PresupuestoNumerico = parseFloat(PresupuestoNumerico);
  var userse = $("#userse").val();
  let formData = new FormData();
  formData.append("funcion", "SavePresupuesto");
  formData.append("idCiudad", idCiudad);
  formData.append("PresuCOP", PresuCOP);
  formData.append("ValorLocal", PresupuestoNumerico);
  formData.append("userse", userse);

  try {
    let req2 = await fetch("controller/InicioController.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    if (res2) {
      if (res2.cod === 1) {
        Swal.fire({
          icon: "success",
          text: "Presupuesto guardado, revisa tu perfil",
        });
        $("#respond").html("");
      } else {
        Swal.fire({
          icon: "info",
          text: "Error en Servidor",
        });
      }
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      text: "Error en el sistema",
    });
  }
}
