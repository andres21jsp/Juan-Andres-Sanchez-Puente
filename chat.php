<?php
include 'includes/header.php';
include 'includes/navbar.php';
require_once 'classes/Mensaje.php';

$mensajePantalla = "";
$mensajeObj = new Mensaje();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $mensaje = $_POST['mensaje'] ?? '';

    $resultado = $mensajeObj->guardarChat($usuario, $mensaje);

    if ($resultado === "ok") {
        $mensajePantalla = "Mensaje enviado al chat.";
    } else {
        $mensajePantalla = $resultado;
    }
}

$mensajes = $mensajeObj->obtenerChat();
?>

<main class="contenedor">
    <form class="formulario validar" method="POST">
        <h2>Chat básico</h2>

        <?php if ($mensajePantalla): ?>
            <div class="alerta exito"><?php echo $mensajePantalla; ?></div>
        <?php endif; ?>

        <label>Nombre de usuario</label>
        <input type="text" name="usuario" required>

        <label>Mensaje</label>
        <textarea name="mensaje" rows="4" required></textarea>

        <button class="btn" type="submit">Enviar al chat</button>
    </form>

    <section class="card">
        <h2>Mensajes recientes</h2>

        <?php foreach ($mensajes as $msg): ?>
            <div class="chat-mensaje">
                <strong><?php echo $msg['usuario']; ?></strong>
                <p><?php echo $msg['mensaje']; ?></p>
                <small><?php echo $msg['fecha']; ?></small>
            </div>
        <?php endforeach; ?>
    </section>
</main>

<?php include 'includes/footer.php'; ?>