document.addEventListener("DOMContentLoaded", function() {
            const btnHamburguesa = document.querySelector('.btn-menu-hamburguesa');
            const moduloContenedor = document.querySelector('.modulo_contenedor');

            // Abrir / Cerrar el menú al hacer clic
            btnHamburguesa.addEventListener('click', function(e) {
                e.stopPropagation(); // Evita que el clic se propague inmediatamente al document
                moduloContenedor.classList.toggle('active');
            });

            // Cerrar el menú al hacer clic fuera de él
            document.addEventListener('click', function(e) {
                // Verifica si el menú está abierto y si el clic NO ocurrió dentro del menú ni sobre el botón
                if (moduloContenedor.classList.contains('active') && 
                    !moduloContenedor.contains(e.target) && 
                    !btnHamburguesa.contains(e.target)) {
                    
                    moduloContenedor.classList.remove('active');
                }
            });
        });