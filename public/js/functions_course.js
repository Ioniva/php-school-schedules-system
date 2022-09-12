// Declarar variables
const qs = ($value) => document.querySelector($value);

// Agregar evento al iniciar el DOM
document.addEventListener(
  "DOMContentLoaded",
  function () {
    // Variable para acceder al formulario de student
    const formCourse = qs("#courseForm");
    // Se ejecuta esta funcion cuando pulsamos sobre le boton de Guardar del modal
    formCourse.onsubmit = function (e) {
      // Mantener la modal abierta
      e.preventDefault();
      // Inicializar variables
      let name = qs("#name").value;
      let description = qs("#description").value;
      let date_start = qs("#date_start").value;
      let date_end = qs("#date_end").value;
      let active = qs("#active").value;

      // Comprobar el contenido de las variables
      if (
        (name == "") |
        (description == "") |
        (date_start == "") |
        (date_end == "") |
        (active == "")
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
      let ajaxUrl = base_url + "/course/setCourse";
      let formData = new FormData(formCourse);

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
            $("#modalFormCourse").modal("hide");
            // Reseteamos los datos del formulario
            formCourse.reset();
            // Mostramos mensaje de exito
            Swal.fire("Courses", objData.msg, "success").then(() => {
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

function fntEditCourse(id) {
  // Actualizar los titulos de la modal
  // Insertar -> Update
  qs("#titleModal").innerHTML = "Actualizar curso";
  document
    .querySelector("#btnAction")
    .classList.replace("btn-primary", "btn-info");
  qs("#btnText").innerHTML = "Actualizar";

  // Declaramos las variables y preparar llamada XHR para mandar los datos del formulario
  let idCourse = id;
  let request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  // base_url = direccion del proyecto, se puede modificar en configs/config.php
  let ajaxUrl = base_url + "/course/getCourse/" + idCourse;

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
        qs("#idCourse").value = objData.data.id_course;
        qs("#name").value = objData.data.name;
        qs("#description").value = objData.data.description;
        qs("#date_start").value = objData.data.date_start;
        qs("#date_end").value = objData.data.date_end;
        if (objData.data.active == 1) {
          qs("#active").checked = true;
        } else {
          qs("#active").checked = false;
        }
      }
      // Mostrar modal
      $("#modalFormCourse").modal("show");
    }
  };
}

function fntDelCourse(id) {
  // Inicializar las variables
  let idCourse = id;

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
      let ajaxUrl = base_url + "/course/delCourse/";
      let strData = "id=" + idCourse;

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
  qs("#idCourse").value = "";
  qs(".modal-header").classList.replace("headerUpdate", "headerRegister");
  qs("#btnAction").classList.replace("btn-info", "btn-primary");
  qs("#btnText").innerHTML = "Save";
  qs("#titleModal").innerHTML = "Add Course";
  qs("#courseForm").reset();
  $("#modalFormCourse").modal("show");
}
