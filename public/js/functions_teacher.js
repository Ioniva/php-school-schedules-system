// Declarar variables
const qs = ($value) => document.querySelector($value);
let teachersTable;

// Agregar evento al iniciar el DOM
document.addEventListener(
  "DOMContentLoaded",
  function () {
    // Variable para acceder al formulario de student
    const formTeacher = qs("#teacherForm");
    // Se ejecuta esta funcion cuando pulsamos sobre le boton de Guardar del modal
    formTeacher.onsubmit = function (e) {
      // Mantener la modal abierta
      e.preventDefault();
      // Inicializar variables
      let name = qs("#name").value;
      let surname = qs("#surname").value;
      let email = qs("#email").value;
      let password = qs("#password").value;

      // Comprobar el contenido de las variables
      if (
        (name == "") |
        (surname == "") |
        (email == "") |
        (phone == "") |
        (nif == "")
      ) {
        // Mostrar mensaje de error en caso de estar vacio un campo del formulario
        Swal.fire("Atencion", "Todos los campos son obligatorios.", "error");
        return false;
      }

      // Si hay algun input del formulario en rojo (vacio), mostrar mensaje de error
      let elementsValid = document.getElementsByClassName("valid");
      for (element of elementsValid) {
        if (element.classList.contains("is-invalid")) {
          swal("Atención", "Por favor verifique los campos en rojo.", "error");
          return false;
        }
      }

      // Preparar llamada XHR para mandar los datos del formulario
      let request = window.XMLHttpRequest
        ? new XMLHttpRequest()
        : new ActiveXObject("Microsoft.XMLHTTP");
      let ajaxUrl = base_url + "/teacher/setTeacher";
      let formData = new FormData(formTeacher);

      // Enviar datos del formulario al controlador, mediante el metodo POST
      request.open("POST", ajaxUrl, true);
      request.send(formData);

      request.onreadystatechange = function () {
        // Comprobar si la request ha devuelto un OK
        if (request.readyState == 4 && request.status == 200) {
          // Convertimos el resultado JSON en un objeto
          let objData = JSON.parse(request.responseText);
          // Comprobamos el estado del a ejecutacion
          if (objData.status) {
            // Cerrar la modal abierta
            $("#modalFormTeacher").modal("hide");
            // Reseteamos los datos del formulario
            formTeacher.reset();
            // Mostramos mensaje de exito
            Swal.fire("Teachers", objData.msg, "success").then(() => {
              // Actualizar la pagina, para que se actualize la tabla
              location.reload();
            });
          } else {
            // Mostramos mensaje de error
            Swal.fire("Error", objData.msg, "error");
          }
        }
      };
    };
  },
  false
);

function fntEditTeacher(id) {
  // Actualizar los titulos de la modal
  // Insertar -> Update
  qs("#titleModal").innerHTML = "Actualizar Profesor";
  document
    .querySelector("#btnAction")
    .classList.replace("btn-primary", "btn-info");
  qs("#btnText").innerHTML = "Actualizar";

  // Declaramos las variables y preparar llamada XHR para mandar los datos del formulario
  let idTeacher = id;
  let request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  // base_url = direccion del proyecto, se puede modificar en configs/config.php
  let ajaxUrl = base_url + "/teacher/getTeacher/" + idTeacher;

  // Recibir datos del formulario mediante el metodo GET
  // Una vez recibidos los datos, insertarlos en la modal
  request.open("GET", ajaxUrl, true);
  request.send();

  request.onreadystatechange = function () {
    // Comprobar si la request ha devuelto un OK
    if (request.readyState == 4 && request.status == 200) {
      // Convertimos el resultado JSON en un objeto
      let objData = JSON.parse(request.responseText);
      // Comprobamos el estado del a ejecutacion
      if (objData.status) {
        // Actualizar los inputs de la modal con estos valores
        qs("#idTeacher").value = objData.data.id_teacher;
        qs("#name").value = objData.data.name;
        qs("#surname").value = objData.data.surname;
        qs("#email").value = objData.data.email;
        qs("#phone").value = objData.data.telephone;
        qs("#nif").value = objData.data.nif;
      }
      // Mostrar modal
      $("#modalFormTeacher").modal("show");
    }
  };
}

function fntDelTeacher(id) {
  // Inicializar las variables
  let idTeacher = id;

  // Mostrar mensaje de revision con sweetalert2
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    // Comprobar si se ha pulsado el boton de confirmar
    if (result.isConfirmed) {
      // Declaramos las variables y preparar llamada XHR para mandar los datos del formulario
      let request = window.XMLHttpRequest
        ? new XMLHttpRequest()
        : new ActiveXObject("Microsoft.XMLHTTP");
      // base_url = direccion del proyecto, se puede modificar en configs/config.php
      let ajaxUrl = base_url + "/teacher/delTeacher/";
      let strData = "id=" + idTeacher;

      // Enviar datos del formulario al controlador, mediante el metodo POST
      request.open("POST", ajaxUrl, true);
      request.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      request.send(strData);
      request.onreadystatechange = function () {
        // Comprobar si la request ha devuelto un OK
        if (request.readyState == 4 && request.status == 200) {
          // Convertimos el resultado JSON en un objeto
          let objData = JSON.parse(request.responseText);
          // Comprobamos el estado del a ejecutacion
          if (objData.status) {
            // Mostramos mensaje de exito
            Swal.fire("Eliminar!", objData.msg, "success").then(() => {
              // Actualizar la pagina, para que se actualize la tabla
              location.reload();
            });
          } else {
            // Mostrar mensaje de error
            Swal.fire("Atención!", objData.msg, "error");
          }
        }
      };
    }
  });
}

// Funcion para abrir la modal de añadir usuario
// Esta funcion es valida tanto para la modal de update como crear o insertar
function openModal() {
  qs("#idTeacher").value = "";
  qs(".modal-header").classList.replace("headerUpdate", "headerRegister");
  qs("#btnAction").classList.replace("btn-info", "btn-primary");
  qs("#btnText").innerHTML = "Save";
  qs("#titleModal").innerHTML = "Add Teacher";
  qs("#teacherForm").reset();
  $("#modalFormTeacher").modal("show");
}
