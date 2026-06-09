<?php
include 'includes/header.php';
include 'includes/navbar.php';

$resultados = [];

$paginas = [
    "inicio" => "index.php",
    "servicios" => "servicios.php",
    "ayuda" => "ayuda.php",
    "contacto" => "contacto.php",
    "buzón" => "buzon.php",
    "buzon" => "buzon.php",
    "chat" => "chat.php",
    "registro" => "registro.php",
    "login" => "login.php",
    "iniciar sesión" => "login.php",
    "recuperar contraseña" => "recuperar.php",
    "mapa" => "mapa-sitio.php",
    "mapa del sitio" => "mapa-sitio.php"
];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['q'])) {
    $q = strtolower(trim($_GET['q']));

    foreach ($paginas as $clave => $url) {
        if (str_contains($clave, $q) || str_contains($q, $clave)) {
            $resultados[$clave] = $url;
        }
    }
}
?>

<main class="contenedor">
    <form class="formulario" method="GET">
        <h2>Búsqueda en el sitio</h2>

        <label>Buscar sección</label>
        <input type="text" name="q" required placeholder="Ejemplo: registro, ayuda, chat">

        <button class="btn" type="submit">Buscar</button>
    </form>

    <section class="card">
        <h2>Resultados</h2>

        <?php if (isset($_GET['q']) && empty($resultados)): ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>

        <?php foreach ($resultados as $nombre => $url): ?>
            <p><a href="<?php echo $url; ?>"><?php echo ucfirst($nombre); ?></a></p>
        <?php endforeach; ?>
    </section>
</main>

<?php include 'includes/footer.php'; ?>