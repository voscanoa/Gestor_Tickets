<?php
class Ticket extends Conectar
{
    public function insert_ticket($userowner_id, $category_id, $ticket_title, $ticket_anydesk, $ticket_description)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tickets(userowner_id, category_id, ticket_title, ticket_anydesk, ticket_description) VALUES (?,?,?,?,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $userowner_id);
        $sql->bindValue(2, $category_id);
        $sql->bindValue(3, $ticket_title);
        $sql->bindValue(4, $ticket_anydesk);
        $sql->bindValue(5, $ticket_description);
        $sql->execute();


        $sql1 = "SELECT lastval() AS ticket_id";
        $sql1 = $conectar->prepare($sql1);
        $sql1->execute();
        return $sql1->fetchAll(pdo::FETCH_ASSOC);
    }

    public function insert_ticket_detalle($ticket_id, $details_name, $user_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO ticket_details (ticket_id, details_name, user_id) VALUES (?,?,?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ticket_id);
        $sql->bindValue(2, $details_name);
        $sql->bindValue(3, $user_id);
        $sql->execute();
    }
}
