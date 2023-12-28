function init() {
  $("#ticket_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#ticket_form")[0]);
  $.ajax({
    url: "../../controller/ticket.php?op=insert",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      console.log(datos);
    },
  });
}

$(document).ready(function () {
  $.post("../../controller/categoria.php?op=combo", function (data) {
    $("#category_id").html(data);
  });
});
console.log("nuevo ticket");
init();
