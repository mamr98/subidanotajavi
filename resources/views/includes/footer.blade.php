<style>
    .sticky-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        /* Asegura que el footer esté por encima de otros elementos */
    }

    html,
    body {
        height: 100%;
        margin: 0;
    }

    body {
        display: flex;
        flex-direction: column;

    }
    @media (max-width: 503px) {
    body {
        margin-bottom: 110px; /* Aumenta el margen inferior en dispositivos móviles */
    }
}
</style>
<footer class="main-footer bg-navy text-white text-center">
    <div class="container">
        <div class="mb-2">
            <a href="#" class="text-light mx-2">Sobre nosotros</a>
            <a href="#" class="text-light mx-2">Política de privacidad</a>
            <a href="#" class="text-light mx-2">Términos y condiciones</a>
        </div>

        <div class="mb-2">
            <a href="https://www.instagram.com/institutomedac/?hl=es" target="_blank" class="text-light mx-2">
                <i class="fab fa-instagram fa-lg"></i>
            </a>
            <a href="https://www.facebook.com/profile.php?id=61572362099718" target="_blank" class="text-light mx-2">
                <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a href="https://es.linkedin.com/school/davante-medac/" target="_blank" class="text-light mx-2">
                <i class="fab fa-linkedin fa-lg"></i>
            </a>
        </div>

        <div class="text-light">
            <p>&copy; {{ date('Y') }} Medac. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
<script>
    //quitar class footer
    document.addEventListener("DOMContentLoaded", function() {
        // Selecciona el footer predeterminado de AdminLTE
        const adminlteFooter = document.querySelector('footer.main-footer');

        // Si existe, elimina la clase "main-footer"
        if (adminlteFooter) {
            adminlteFooter.classList.remove('main-footer');
            adminlteFooter.classList.add('sticky-footer');
        }
    });
</script>
