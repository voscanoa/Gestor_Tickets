<?php
require '../include/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../config/conexion.php');
require_once('../models/Usuario.php');

class Email extends PHPMailer
{
    protected $gCorreo = 'vladimir.oscanoa.dev';
    protected $gContrasena = 'atebzteghsrsjssi';

    private $key = "GestorTickets";
    private $cipher = "aes-256-cbc";

    public function registrar($user_id)
    {
        $conexion = new Conectar();

        $usuario = new Usuario();
        $datos = $usuario->get_usuario_id($user_id);

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
        $cifrado = openssl_encrypt($user_id, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        $textoCifrado = base64_encode($iv . $cifrado);

        $this->isSMTP();
        $this->Host = 'smtp.gmail.com';
        $this->SMTPAuth   = true;
        $this->Username   = $this->gCorreo;
        $this->Password   = $this->gContrasena;
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->Port       = 465;
        $this->setFrom($this->gCorreo, 'Registro en Gestor de Tickets de ELECTROPERU');

        $this->CharSet = 'UTF8';
        $this->addAddress($datos[0]["user_email"]);
        // $this->addAddress("vladimir.oscanoa14@gmail.com");
        $this->IsHTML(true);
        $this->Subject = 'Gestor de tickets';

        $url = $conexion->ruta() . "view/ConfirmarEmail/?id=" . $textoCifrado;

        $cuerpo = file_get_contents("../assets/email/registrar.html");
        $cuerpo = str_replace("xlinkcorreourl", $url, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags('confirmar Registro');

        try {
            $this->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function recuperar($user_email)
    {
        $conexion = new Conectar();

        $usuario = new Usuario();
        $datos = $usuario->get_usuario_correo($user_email);

        $this->isSMTP();
        $this->Host = 'smtp.gmail.com';
        $this->SMTPAuth   = true;
        $this->Username   = $this->gCorreo;
        $this->Password   = $this->gContrasena;
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->Port       = 465;
        $this->setFrom($this->gCorreo, 'Recuperar contraseña Gestor de Tickets de ELECTROPERU');

        $this->CharSet = 'UTF8';
        $this->addAddress($datos[0]["user_email"]);
        // $this->addAddress("vladimir.oscanoa14@gmail.com");
        $this->IsHTML(true);
        $this->Subject = 'Gestor de tickets';

        $url = $conexion->ruta();
        $xpassusu = $this->generarXPassUsu();
        $usuario->recuperar_usuario($user_email, $xpassusu);

        $cuerpo = file_get_contents("../assets/email/recuperar.html");
        $cuerpo = str_replace("xpassusu", $xpassusu, $cuerpo);
        $cuerpo = str_replace("xlinksistema", $url, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags('Recuperar Contrasena');

        try {
            $this->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    private function generarXPassUsu()
    {
        $parteAlfanumerica = substr(md5(rand()), 0, 3);
        $parteNumerica = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $resultado = $parteAlfanumerica . $parteNumerica;
        return substr($resultado, 0, 6);
    }
}
