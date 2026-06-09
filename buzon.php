<?php
include 'includes/header.php';
include 'includes/navbar.php';
require_once 'classes/Mensaje.php';
require_once 'classes/Validacion.php';

$mensajePantalla = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $asunto = $_POST['asunto'] ?? '';
    $mensaje = $_POST['mensaje'] ?? '';
    $captcha = $_POST['captcha'] ?? '';

    if (!Validacion::captcha($captcha)) {
        $mensajePantalla = "La verificación humana es incorrecta.";
    } else {
        $mensajeObj = new Mensaje();
        $resultado = $mensajeObj->guardarBuzon($nombre, $correo, $asunto, $mensaje);

        if ($resultado === "ok") {
            $mensajePantalla = "Mensaje enviado correctamente.";
        } else {
            $mensajePantalla = $resultado;
        }
    }
}
?>

<main class="contenedor">
    <form class="formulario validar" method="POST">
        <h2>Buzón</h2>

        <?php if ($mensajePantalla): ?>
            <div class="alerta <?php echo $mensajePantalla === 'Mensaje enviado correctamente.' ? 'exito' : 'error'; ?>">
                <?php echo $mensajePantalla; ?>
            </div>
        <?php endif; ?>

        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Correo</label>
        <input type="email" name="correo" required>

        <label>Asunto</label>
        <input type="text" name="asunto" required>

        <label>Mensaje</label>
        <textarea name="mensaje" rows="5" required></textarea>

        <label>Verificación humana: ¿Cuánto es 4 + 3?</label>
        <input type="text" name="captcha" required>

        <button class="btn" type="submit">Enviar mensaje</button>
    </form>
</main>

<?php include 'includes/footer.php'; ?>