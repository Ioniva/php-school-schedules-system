// Declarar variables
const qs = ($value) => document.querySelector($value);

// Agregar evento al iniciar el DOM
document.addEventListener(
  "DOMContentLoaded",
  function () {
    // Variable para acceder al formulario de student
    const formUsuario = qs("#userForm");
    // Se ejecuta esta funcion cuando pulsamos sobre le boton de Guardar del modal
    formUsuario.onsubmit = function (e) {
      // Mantener la modal abierta
      e.preventDefault();
      // Declarar variables
      let userId = qs("#userId").value;
      let roleId = qs("#roleId").value;
      let name;
      let surname;
      let username;
      let email;
      let phone;
      let nif;
      let password;

      // Comprobar el contenido de las variables segun el rol
      // Rol alumno
      if (roleId == 1) {
        name = qs("#name").value;
        surname = qs("#surname").value;
        email = qs("#email").value;
        phone = qs("#phone").value;
        nif = qs("#nif").value;

        if (
          (userId == "") |
          (name == "") |
          (surname == "") |
          (username == "") |
          (email == "") |
          (phone == "") |
          (nif == "")
        ) {
          // Mostrar mensaje de error en caso de estar vacio un campo del formulario
          Swal.fire("Atencion", "Todos los campos son obligatorios.", "error");
          return false;
        }
      }

      // Rol profesor
      if (roleId == 2) {
        name = qs("#name").value;
        surname = qs("#surname").value;
        email = qs("#email").value;
        phone = qs("#phone").value;
        nif = qs("#nif").value;

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
      }

      // Rol administrador
      if (roleId == 3) {
        name = qs("#name").value;
        email = qs("#email").value;

        if ((name == "") | (email == "")) {
          // Mostrar mensaje de error en caso de estar vacio un campo del formulario
          Swal.fire("Atencion", "Todos los campos son obligatorios.", "error");
          return false;
        }
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

      let ajaxUrl;

      if (roleId == 1) {
        ajaxUrl = base_url + "/student/setStudent";
      }

      if (roleId == 2) {
        ajaxUrl = base_url + "/student/setTeacher";
      }

      if (roleId == 3) {
        ajaxUrl = base_url + "/student/setAdmin";
      }

      let formData = new FormData(formUsuario);

      // Enviar datos del formulario al controlador, mediante el metodo POST
      request.open("POST", ajaxUrl, true);
      request.send(formData);

      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          let objData = JSON.parse(request.responseText);

          if (objData.status) {
            let ajaxUpdateUrl = base_url + "/profile/updateProfile";

            request.open("POST", ajaxUpdateUrl, true);
            request.send(formData);

            request.onreadystatechange = function () {
              console.log(request);

              if (request.readyState == 4 && request.status == 200) {
                let objDataUpdate = JSON.parse(request.responseText);
                if (objDataUpdate.status) {
                  Swal.fire("Students", objData.msg, "success").then(() => {
                    location.reload();
                  });
                }
              } else {
                // Mostramos mensaje de error
                Swal.fire("Error", objData.msg, "error");
              }
            };
          }
        }
      };
    };
  },
  false
);
