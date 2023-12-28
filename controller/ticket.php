<?php
require_once("../config/conexion.php");
require_once("../models/Ticket.php");
require_once("../models/Email.php");

$ticket = new Ticket();
$email = new Email();

switch ($_GET["op"]) {
    case "insert":
        $datos = $ticket->insert_ticket(
            $_SESSION["user_id"],
            $_POST["category_id"],
            $_POST["ticket_title"],
            $_POST["ticket_anydesk"],
            $_POST["ticket_description"],
        );

        if (is_array($datos) == true and count($datos) == 0) {
            echo "0";
        } else {

            $mes = date("m");
            $anio = date("Y");

            echo $mes . "-" . $anio . "-" . $datos[0]["ticket_id"];

            if (empty($_FILES['file']['name'])) {
            } else {
                $countfiles = count($_FILES['file']['name']);
                $ruta = "../assets/document/" . $datos[0]["ticket_id"] . "/";
                $file_arr = array();
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                for ($index = 0; $index < $countfiles; $index++) {
                    $nombre = $_FILES['file']['tmp_name'][$index];
                    $destino = $ruta . $_FILES['file']['name'][$index];

                    $ticket->insert_ticket_detalle($datos[0]["ticket_id"], $_FILES['file']['name'][$index], $_SESSION["user_id"], 'Pendiente');

                    move_uploaded_file($nombre, $destino);
                }

                /* TODO:Enviar Alerta por Email */
                // $email->enviar_registro($datos[0]["ticket_id"]);
            }
        }
        break;
}
