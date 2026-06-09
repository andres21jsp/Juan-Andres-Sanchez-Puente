<?php
require_once __DIR__ . '/Conexion.php';
require_once __DIR__ . '/Validacion.php';

class Usuario
{
    private $db;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->db = $conexion->conectar();
    }

    public function registrar($nombre, $correo, $password)
    {
        $nombre = Validacion::limpiar($nombre);
        $correo = Validacion::limpiar($correo);

        if (!Validacion::texto($nombre)) {
            return "El nombre no es válido.";
        }

        if (!Validacion::correo($correo)) {
            return "El correo no tiene un formato válido.";
        }

        if (!Validacion::password($password)) {
            return "La contraseña debe tener mínimo 8 caracteres.";
        }

        if ($this->correoExiste($correo)) {
            return "El correo ya está registrado.";
        }

        $passwordSeguro = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios (nombre, correo, password) VALUES (:nombre, :correo, :password)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':password', $passwordSeguro);

        if ($stmt->execute()) {
            return "ok";
        }

        return "No se pudo registrar el usuario.";
    }

    public function login($correo, $password)
    {
        $correo = Validacion::limpiar($correo);

        if (!Validacion::correo($correo)) {
            return false;
        }

        $sql = "SELECT * FROM usuarios WHERE correo = :correo LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }

        return false;
    }

    private function correoExiste($correo)
    {
        $sql = "SELECT id FROM usuarios WHERE correo = :correo LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
?>