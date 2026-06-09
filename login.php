<?php
include 'includes/header.php';
include 'includes/navbar.php';
require_once 'classes/Usuario.php';

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'] ?? '';
    $password = $_POST['password'] ?? '';

    $usuarioObj = new Usuario();
    $usuario = $usuarioObj->login($correo, $password);

    if ($usuario) {
        $_SESSION['usuario'] = $usuario['nombre'];
        $_SESSION['correo'] = $usuario['correo'];
        header("Location: dashboard.php");
        exit;
    } else {
        $mensaje = "Correo o contraseña incorrectos.";
    }
}
?>

<main class="contenedor">
    <form class="formulario validar" method="POST">
        <h2>Inicio de sesión</h2>

        <?php if ($mensaje): ?>
            <div class="alerta error"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <label>Correo electrónico</label>
        <input type="email" name="correo" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <button class="btn" type="submit">Ingresar</button>
    </form>
</main>

<?php include 'includes/footer.php'; ?>