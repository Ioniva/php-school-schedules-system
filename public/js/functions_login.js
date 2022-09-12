// Declarar variables
const qs = ($value) => document.querySelector($value);

document.addEventListener(
  "DOMContentLoaded",
  function () {
    if (qs("#loginForm")) {
      let formLogin = qs("#loginForm");
      formLogin.onsubmit = function (e) {
        e.preventDefault();

        let email = qs("#email").value;
        let password = qs("#password").value;

        if (email == "" || password == "") {
          Swal.fire("Por favor", "Escribe usuario y contraseña", "error");
          return false;
        } else {
          let request = window.XMLHttpRequest
            ? new XMLHttpRequest()
            : new ActiveXObject();
          let ajaxUrl = base_url + "/login/loginUser";
          let formData = new FormData(formLogin);

          request.open("POST", ajaxUrl, true);
          request.send(formData);
          request.onreadystatechange = function () {
            if (request.readyState != 4 && request.status == 200) {
              let objData = JSON.parse(request.responseText);
              if (objData.status) {
                window.location = base_url + "/calendar";
              } else {
                Swal.fire("Atencion", objData.msg, "error");
                qs("#password").value = "";
                return false;
              }
            } else {
              Swal.fire("Atencion", "Error en el proceso", "error");
              return false;
            }
          };
        }
      };
    }
  },
  false
);
