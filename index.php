<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main class="contenedor">

    <section class="hero inicio-hero">
        <div class="hero-contenido">
            <h1>UdderSupport</h1>
            <p>
                Plataforma de atención y soporte en línea diseñada para resolver dudas,
                recibir solicitudes y facilitar la comunicación con los usuarios de forma clara,
                organizada y segura.
            </p>

            <div class="hero-botones">
                <a href="registro.php" class="btn">Crear cuenta</a>
                <a href="login.php" class="btn btn-secundario">Iniciar sesión</a>
            </div>
        </div>
    </section>

    <section class="seccion-titulo">
        <span>Servicios disponibles</span>
        <h2>Herramientas principales</h2>
        <p>
            Encuentra las opciones necesarias para comunicarte, consultar información,
            iniciar sesión y recibir asistencia dentro del sitio.
        </p>
    </section>

    <section class="grid-servicios">
        <article class="servicio-card">
            <div class="numero">01</div>
            <h3>Registro e inicio de sesión</h3>
            <p>
                Crea una cuenta personal y accede al sistema mediante formularios con
                validaciones de seguridad.
            </p>
            <a href="registro.php">Ir a registro</a>
        </article>

        <article class="servicio-card">
            <div class="numero">02</div>
            <h3>Buzón de solicitudes</h3>
            <p>
                Envía dudas, comentarios o reportes para que puedan ser atendidos de
                manera ordenada.
            </p>
            <a href="buzon.php">Abrir buzón</a>
        </article>

        <article class="servicio-card">
            <div class="numero">03</div>
            <h3>Ayuda y chat</h3>
            <p>
                Consulta preguntas frecuentes y utiliza el chat básico para dejar mensajes
                de soporte.
            </p>
            <a href="ayuda.php">Ver ayuda</a>
        </article>
    </section>

    <section class="bloque-destacado">
        <div>
            <span class="etiqueta-bloque">Protección de información</span>
            <h2>Validación de datos</h2>
            <p>
                El sitio revisa la información ingresada en los formularios, valida campos
                obligatorios, correo electrónico, contraseña y una verificación humana antes
                de enviar los datos.
            </p>
        </div>

        <a href="mapa-sitio.php" class="btn">Ver mapa del sitio</a>
    </section>

    <section class="grid-info">
        <article class="info-card">
            <h3>Navegación clara</h3>
            <p>
                El menú permite acceder fácilmente a las secciones principales del sitio,
                como ayuda, contacto, buzón, chat y búsqueda.
            </p>
        </article>

        <article class="info-card">
            <h3>Comunicación directa</h3>
            <p>
                Los usuarios pueden enviar mensajes mediante el buzón, formulario de contacto
                o chat básico.
            </p>
        </article>

        <article class="info-card">
            <h3>Acceso seguro</h3>
            <p>
                El inicio de sesión utiliza validaciones y almacenamiento seguro de contraseña
                para proteger la cuenta del usuario.
            </p>
        </article>
    </section>

    <a href="chat.php" class="chat-flotante">Chat</a>

</main>

<?php include 'includes/footer.php'; ?>