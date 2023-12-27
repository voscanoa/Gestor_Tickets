<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");

$usuario = new Usuario();
switch ($_GET["op"]) {
    case "registrar":
        $datos = $usuario->get_usuario_correo($_POST["user_email"]);
        if (is_array($datos) == true and count($datos) == 0) {
            $usuario->registrar_usuario($_POST["user_name"], $_POST["user_email"], $_POST["user_password"]);
            echo "1";
        } else {
            echo "0";
        }
        break;
}
