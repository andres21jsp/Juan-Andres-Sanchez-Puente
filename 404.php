<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main class="contenedor">
    <section class="pagina-404">
        <div class="contenedor-404">

            <div class="ilustracion-404">
                <div class="circulo fondo-uno"></div>
                <div class="circulo fondo-dos"></div>

                <div class="tarjeta-error">
                    <span class="codigo-404">404</span>
                    <span class="estado-error">Página no encontrada</span>
                </div>
            </div>

            <div class="texto-404">
                <span class="etiqueta-error">Ruta no disponible</span>

                <h1>La página que buscas no existe</h1>

                <p>
                    Es posible que la dirección haya sido escrita incorrectamente,
                    que el contenido se haya movido o que la página ya no esté disponible.
                    Puedes regresar al inicio o crear una cuenta para acceder a los servicios del sitio.
                </p>

                <div class="acciones-404">
                    <a href="index.php" class="btn">Volver al inicio</a>
                    <a href="registro.php" class="btn btn-404-secundario">Registrarse</a>
                </div>
            </div>

        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>