<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");
require_once("../models/Email.php");

$usuario = new Usuario();
$email = new Email();

switch ($_GET["op"]) {
    case "registrar":
        $datos = $usuario->get_usuario_correo($_POST["user_email"]);
        if (is_array($datos) == true and count($datos) == 0) {
            $datos1 = $usuario->registrar_usuario($_POST["user_name"], $_POST["user_email"], $_POST["user_password"]);
            $email->registrar($datos1[0]["user_id"]);
            echo "1";
        } else {
            echo "0";
        }
        break;

    case "activar":
        $usuario->activar_usuario($_POST["user_id"]);
        break;
}
