<?php
include 'includes/header.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

include 'includes/navbar.php';
?>

<main class="contenedor">
    <section class="card">
        <h2>Panel de usuario</h2>
        <p>Bienvenido, <?php echo $_SESSION['usuario']; ?>.</p>
        <p>Esta página está protegida y solo puede ser consultada por usuarios que iniciaron sesión correctamente.</p>
    </section>
</main>

<?php include 'includes/footer.php'; ?>