var timerInterval;

function init() {
  $("#mnt_form").on("submit", function (e) {
    e.preventDefault();
    if (isFormValid()) {
      registrar(e);
    } else {
      displayValidationMessages();
    }
  });
}

function isFormValid() {
  return (
    validateEmail() &&
    validateText("user_name") &&
    validatePassword() &&
    validatePasswordMatch()
  );
}

function validateEmail() {
  var email = $("#user_email").val();
  var isValid = validator.isEmail(email);
  // // TODO Modificar apra solo aceptar correo de electroperu
  //   var isValid = /\@electroperu\.com\.pe$/.test(email);
  displayErrorMessage("#user_email", isValid, "Ingrese Correo Electrónico ");
  return isValid;
}

function validateText(fieldId) {
  var value = $("#" + fieldId).val();
  var isValid = validator.isLength(value, { min: 1 });
  displayErrorMessage("#" + fieldId, isValid, "Este campo es obligatorio.");
  return isValid;
}

function validatePassword() {
  var password = $("#user_password").val();
  var isValid = validator.isLength(password, { min: 8 });
  displayErrorMessage(
    "#user_password",
    isValid,
    "La contraseña debe tener al menos 8 caracteres"
  );
  return isValid;
}

function validatePasswordMatch() {
  var password = $("#user_password").val();
  var confirmPassword = $("#user_password_confir").val();
  var isValid = validator.equals(password, confirmPassword);
  displayErrorMessage(
    "#user_password_confir",
    isValid,
    "Las contraseñas no coinciden."
  );
  return isValid;
}

function displayErrorMessage(fieldSelector, isValid, message) {
  var errorField = $(fieldSelector).next(".validation-error");
  errorField.text(isValid ? "" : message);
  errorField.toggleClass("text-danger", !isValid);
}

function displayValidationMessages() {
  validateEmail();
  validateText("user_name");
  validatePassword();
  validatePasswordMatch();
}

function registrar() {
  var formData = new FormData($("#mnt_form")[0]);
  $.ajax({
    url: "../../controller/usuario.php?op=registrar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      if (datos == 1) {
        Swal.fire({
          title: "¡Registro exitoso!",
          text: "Por favor, inicia sesión. Serás redirigido en 10 segundos.",
          icon: "success",
          confirmButtonColor: "#5156be",
          timer: 5000,
          timerProgressBar: true,
          didOpen: function () {
            Swal.showLoading();
            timerInterval = setInterval(function () {
              var content = Swal.getHtmlContainer();
              if (!content) return;
              var countdownElement = content.querySelector("b");
              if (countdownElement) {
                countdownElement.textContent = (
                  Swal.getTimerLeft() / 1000
                ).toFixed(0);
              }
            }, 100);
          },
          didClose: function () {
            clearInterval(timerInterval);
            window.location.href = "../../index.php";
          },
        }).then(function (result) {
          if (result.dismiss === Swal.DismissReason.timer) {
            /* console.log("I was closed by the timer"); */
          }
        });
      } else if (datos == 0) {
        Swal.fire({
          title: "Registro",
          text: "¡Oops! Este correo electrónico ya está registrado. Por favor, inicia sesión o utiliza otro correo electrónico.",
          icon: "error",
          confirmButtonColor: "#5156be",
        });
      }
      console.log(datos);
    },
  });
}
init();
console.log("test");
