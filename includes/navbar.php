<header class="header">
    <div class="logo">
        <a href="index.php">UdderSupport</a>
        <span>ID Sitio: ST-U1</span>
    </div>

    <nav class="nav">
        <a href="index.php">Inicio</a>
        <a href="servicios.php">Servicios</a>
        <a href="ayuda.php">Ayuda</a>
        <a href="contacto.php">Contáctanos</a>
        <a href="mapa-sitio.php">Mapa del sitio</a>
        <a href="busqueda.php">Búsqueda</a>
        <a href="buzon.php">Buzón</a>
        <a href="chat.php">Chat</a>

        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="dashboard.php">Panel</a>
            <a href="logout.php">Salir</a>
        <?php else: ?>
            <a href="registro.php">Registrarse</a>
            <a href="login.php">Iniciar sesión</a>
            <a href="recuperar.php">Recuperar contraseña</a>
        <?php endif; ?>
    </nav>
</header>