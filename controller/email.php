<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");
require_once("../models/Email.php");

$usuario = new Usuario();
$email = new Email();

switch ($_GET["op"]) {
    case "recuperar":
        $datos = $usuario->get_usuario_correo($_POST["user_email"]);
        if (is_array($datos) == true and count($datos) == 0) {
            echo "0";
        } else {
            $email->recuperar($_POST["user_email"]);
            echo "1";
        }
        break;
}
