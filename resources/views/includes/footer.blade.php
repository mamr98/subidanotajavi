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
        margin-bottom: 60px; /* Aumenta el margen inferior en dispositivos móviles */
    }
}
</style>
<footer class="main-footer bg-navy text-white py-4">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 items-center text-center md:text-left">
        <p class="text-sm md:text-start ">&copy; {{ date('Y') }} Medac. Todos los derechos reservados.</p>

        <div class="flex justify-center md:justify-end space-x-4">
            <a href="https://www.instagram.com/institutomedac/?hl=es" target="_blank" aria-label="Instagram" class="text-white hover:text-gray-300">
                <i class="fab fa-instagram fa-lg"></i>
            </a>
            <a href="https://www.facebook.com/profile.php?id=61572362099718" target="_blank" aria-label="Facebook" class="text-white hover:text-gray-300">
                <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a href="https://es.linkedin.com/school/davante-medac/" target="_blank" aria-label="LinkedIn" class="text-white hover:text-gray-300">
                <i class="fab fa-linkedin fa-lg"></i>
            </a>
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
        //alert por encima
        const alert = document.getElementById("alert");
        if (alert) {
            alert.style.zIndex = "1050";
        }
        
    });
</script>
