<?php
class Usuario extends Conectar
{
    private $key = "GestorTickets";
    private $cipher = "aes-256-cbc";

    public function login()
    {
        $conectar = parent::conexion();
        parent::set_names();
        if (isset($_POST["enviar"])) {
            $correo = $_POST["user_email"];
            $password = $_POST["user_password"];
            if (empty($correo) and empty($password)) {
                // si viene vacio
                header("Location:" . conectar::ruta() . "index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE user_email=? AND user_password=? AND status_id=1";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $correo);
                $sql->bindValue(2, $password);
                $sql->execute();
                $resultado = $sql->fetch();
                if (is_array($resultado) and count($resultado) > 0) {
                    $_SESSION["user_id"] = $resultado["user_id"];
                    $_SESSION["user_name"] = $resultado["user_name"];
                    // $_SESSION["role_id"] = $resultado["role_id"];
                    header("Location:" . Conectar::ruta() . "view/Home/");
                    exit();
                } else {
                    // Correo Electronico no se encuentra
                    header("Location:" . Conectar::ruta() . "index.php?m=1");
                    exit();
                }
            }
        }
    }

    public function registrar_usuario($user_name, $user_email, $user_password)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO users (role_id, user_name, user_email, user_password) VALUES (3, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user_name);
        $sql->bindValue(2, $user_email);
        $sql->bindValue(3, $user_password);
        $sql->execute();

        $sql1 = "SELECT lastval() AS user_id";
        $sql1 = $conectar->prepare($sql1);
        $sql1->execute();
        return $sql1->fetchAll();
    }

    // Metodo que valida si es correo esta registrado
    public function get_usuario_correo($user_email)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM users WHERE user_email = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user_email);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function get_usuario_id($user_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user_id);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function activar_usuario($user_id)
    {
        $iv_dec = substr(base64_decode($user_id), 0, openssl_cipher_iv_length($this->cipher));
        $cifradoSinIV = substr(base64_decode($user_id), openssl_cipher_iv_length($this->cipher));
        $textoDecifrado = openssl_decrypt($cifradoSinIV, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv_dec);

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE users SET status_id=1, activation_at = NOW() WHERE user_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $textoDecifrado);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function recuperar_usuario($user_email, $user_password)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE users SET user_password=?, update_at = NOW() WHERE user_email = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user_password);
        $sql->bindValue(2, $user_email);
        $sql->execute();
        return $sql->fetchAll();
    }
}
