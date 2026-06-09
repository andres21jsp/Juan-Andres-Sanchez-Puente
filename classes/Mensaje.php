<?php
require_once __DIR__ . '/Conexion.php';
require_once __DIR__ . '/Validacion.php';

class Mensaje
{
    private $db;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->db = $conexion->conectar();
    }

    public function guardarBuzon($nombre, $correo, $asunto, $mensaje)
    {
        $nombre = Validacion::limpiar($nombre);
        $correo = Validacion::limpiar($correo);
        $asunto = Validacion::limpiar($asunto);
        $mensaje = Validacion::limpiar($mensaje);

        if (!Validacion::texto($nombre) || !Validacion::correo($correo) || !Validacion::texto($asunto) || !Validacion::texto($mensaje)) {
            return "Revisa que todos los datos sean correctos.";
        }

        $sql = "INSERT INTO mensajes_buzon (nombre, correo, asunto, mensaje) VALUES (:nombre, :correo, :asunto, :mensaje)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':mensaje', $mensaje);

        if ($stmt->execute()) {
            return "ok";
        }

        return "No se pudo guardar el mensaje.";
    }

    public function guardarChat($usuario, $mensaje)
    {
        $usuario = Validacion::limpiar($usuario);
        $mensaje = Validacion::limpiar($mensaje);

        if (!Validacion::texto($usuario) || !Validacion::texto($mensaje)) {
            return "El mensaje no es válido.";
        }

        $sql = "INSERT INTO mensajes_chat (usuario, mensaje) VALUES (:usuario, :mensaje)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':mensaje', $mensaje);

        if ($stmt->execute()) {
            return "ok";
        }

        return "No se pudo enviar el mensaje.";
    }

    public function obtenerChat()
    {
        $sql = "SELECT * FROM mensajes_chat ORDER BY fecha DESC LIMIT 10";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>