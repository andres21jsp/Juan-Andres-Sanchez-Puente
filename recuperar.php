<?php
include 'includes/header.php';
include 'includes/navbar.php';

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'] ?? '';
    $mensaje = "Si el correo existe en el sistema, se enviarán instrucciones de recuperación.";
}
?>

<main class="contenedor">
    <form class="formulario validar" method="POST">
        <h2>Recuperar contraseña</h2>

        <?php if ($mensaje): ?>
            <div class="alerta exito"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <label>Correo electrónico</label>
        <input type="email" name="correo" required>

        <button class="btn" type="submit">Enviar instrucciones</button>
    </form>
</main>

<?php include 'includes/footer.php'; ?>