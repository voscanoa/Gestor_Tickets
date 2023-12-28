<?php
require_once("../config/conexion.php");
require_once("../models/Ticket.php");
require_once("../models/Email.php");

$ticket = new Ticket();
switch ($_GET["op"]) {
    case "insert":
        $datos = $ticket->insert_ticket(
            $_SESSION["user_id"],
            $_POST["category_id"],
            $_POST["ticket_title"],
            $_POST["ticket_anydesk"],
            $_POST["ticket_description"],
        );

        echo json_encode($datos);
        // if (is_array($datos) == true and count($datos) == 0) {
        //     echo $datos[0]['ticket_id'];
        // } else {
        //     echo "0";
        // }
        break;
}
