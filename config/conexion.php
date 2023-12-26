<?php
session_start();
include('datosConexion.php');
class Conectar
{
    protected $dbh;
    protected function Conexion()
    {
        try {
            $conectar = $this->dbh = new PDO("pgsql:host=" . SERVER . ";port=5432;dbname=" . DBNAME, USER, PASSWORD);
            return $conectar;
        } catch (Exception $e) {
            print "Error DB: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
    public static function ruta()
    {
        return "http://localhost/Gestor_Tickets/";
    }
}
