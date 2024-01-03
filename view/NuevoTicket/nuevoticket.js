let arrImages = [];

Dropzone.autoDiscover = false;

let myDropzone = new Dropzone(".dropzone", {
  url: "../../assets/document",
  maxFilesize: 2,
  maxFiles: 3,
  acceptedFiles: "image/jpeg,image/png",
  addRemoveLinks: true,
  dictRemoveFile: "Quitar",
});

myDropzone.on("maxfilesexceeded", function (file) {
  Swal.fire({
    title: "Gestor de Tickets",
    text: "Solo se permiten un máximo de 3 archivos.",
    icon: "error",
    confirmButtonColor: "#5156BE",
  });
  myDropzone.removeFile(file);
});

myDropzone.on("addedfile", function (file) {
  if (file.size > 2 * 1024 * 1024) {
    Swal.fire({
      title: "Gestor de Tickets",
      text: 'El archivo "' + file.name + '" excede el tamaño maximo de 2 MB.',
      icon: "error",
      confirmButtonColor: "#5156BE",
    });
    myDropzone.removeFile(file);
  }
});

myDropzone.on("addedfile", (file) => {
  arrImages.push(file);
});

myDropzone.on("removedfile", (file) => {
  let i = arrImages.indexOf(file);
  arrImages.splice(i, 1);
});

function init() {
  $("#ticket_form").on("submit", function (e) {
    guardar(e);
  });
}

function guardar(e) {
  e.preventDefault();

  if (arrImages.length === 0) {
    Swal.fire({
      title: "No hay archivos adjuntos, esta seguro de registrar el tramite?",
      icon: "info",
      showDenyButton: true,
      confirmButtonText: "Si",
      denyButtonText: `No`,
    }).then((result) => {
      if (result.isConfirmed) {
        enviarticket();
      }
    });
  } else {
    enviarticket();
  }
}

function enviarticket(e) {
  $("#btnguardar").prop("disabled", true);
  $("#btnguardar").html(
    '<i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>Espere..'
  );

  var formData = new FormData($("#ticket_form")[0]);

  var totalfiles = arrImages.length;

  console.log(totalfiles);
  for (var i = 0; i < totalfiles; i++) {
    formData.append("file[]", arrImages[i]);
  }
  $.ajax({
    url: "../../controller/ticket.php?op=insert",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      $("#ticket_form")[0].reset();
      Dropzone.forElement(".dropzone").removeAllFiles(true);
      console.log(data);
      Swal.fire({
        title: "Mesa de Partes",
        html:
          "Su tramite a sido registrado con exito con Nro: <br><strong>" +
          data +
          "</strong>",
        icon: "success",
        confirmButtonColor: "#5156BE",
      });

      $("#btnguardar").prop("disabled", false);
      $("#btnguardar").html("Guardar");
    },
  });
}

$(document).ready(function () {
  $.post("../../controller/categoria.php?op=combo", function (data) {
    $("#category_id").html(data);
  });
});

$(document).on("click", "#btnlimpiar", function () {
  $("#ticket_form")[0].reset();
  Dropzone.forElement(".dropzone").removeAllFiles(true);
});

console.log("nuevo ticket");
init();
