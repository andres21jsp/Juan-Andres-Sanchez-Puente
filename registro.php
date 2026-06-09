<?php
include 'includes/header.php';
include 'includes/navbar.php';
require_once 'classes/Usuario.php';
require_once 'classes/Validacion.php';

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmar = $_POST['confirmar'] ?? '';
    $captcha = $_POST['captcha'] ?? '';

    if (!Validacion::captcha($captcha)) {
        $mensaje = "La verificación humana es incorrecta.";
    } elseif ($password !== $confirmar) {
        $mensaje = "Las contraseñas no coinciden.";
    } else {
        $usuario = new Usuario();
        $resultado = $usuario->registrar($nombre, $correo, $password);

        if ($resultado === "ok") {
            $mensaje = "Registro realizado correctamente.";
        } else {
            $mensaje = $resultado;
        }
    }
}
?>

<main class="contenedor">
    <form class="formulario validar" method="POST">
        <h2>Registro de usuario</h2>

        <?php if ($mensaje): ?>
            <div class="alerta <?php echo $mensaje === 'Registro realizado correctamente.' ? 'exito' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <label>Nombre completo</label>
        <input type="text" name="nombre" required>

        <label>Correo electrónico</label>
        <input type="email" name="correo" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <label>Confirmar contraseña</label>
        <input type="password" name="confirmar" required>

        <label>Verificación humana: ¿Cuánto es 4 + 3?</label>
        <input type="text" name="captcha" required>

        <button class="btn" type="submit">Registrarse</button>
    </form>
</main>

<?php include 'includes/footer.php'; ?>