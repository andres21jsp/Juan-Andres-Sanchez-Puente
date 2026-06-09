<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main class="contenedor">
    <form class="formulario validar" method="POST">
        <h2>Contáctanos</h2>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="alerta exito">Tu mensaje de contacto fue recibido correctamente.</div>
        <?php endif; ?>

        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Correo</label>
        <input type="email" name="correo" required>

        <label>Asunto</label>
        <input type="text" name="asunto" required>

        <label>Mensaje</label>
        <textarea name="mensaje" rows="5" required></textarea>

        <button class="btn" type="submit">Enviar</button>
    </form>
</main>

<?php include 'includes/footer.php'; ?>