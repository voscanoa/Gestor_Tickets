$(document).ready(function () {
  const url = window.location.href;
  const params = new URLSearchParams(new URL(url).search);
  const confirmar = params.get("id");
  const decode_id = decodeURIComponent(confirmar);
  const id = decode_id.replace(/\s/g, "+");

  console.log(id);

  $.post(
    "../../controller/usuario.php?op=activar",
    { user_id: id },
    function (data) {}
  );
});
