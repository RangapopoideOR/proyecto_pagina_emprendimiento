<header class="header-moderno">
    <div class="header-cont">
        <!-- 1. Logotipo con Acento de Color -->
        <div class="cont-logo">
            <a href="index.php" class="logo">
                <span class="logo-icono">🛍️</span>
                <span class="logo-texto">MI<span class="logo-destacado">TIENDA</span></span>
            </a>
        </div>

        <!-- 2. Menú de Navegación con Efecto Flotante -->
        <nav class="nav-principal">
            <ul class="menu-navegacion">
                <li><a href="index.php" class="activo">Inicio</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="contacto.php">Contáctenos</a></li>
            </ul>
        </nav>

        <!-- 3. Buscador -->
<form action="tienda.php" method="GET" class="cont-buscador">
    <input type="text" name="q" placeholder="Buscar producto..." required autocomplete="off">
    <button type="submit" aria-label="Buscar">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
    </button>
</form>

        <!-- 4. Botón de WhatsApp Neumórfico / Flotante -->
        <div class="panel-usuario">
            <a href="https://wa.me/TUNUMERODETELEFONO?text=Hola,%20quisiera%20recibir%20información" target="_blank" class="btn-header-ws" title="Contactar por WhatsApp">
                <div class="ws-icono-cont">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.57 6.57 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007s-.346.05-.527.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.17-.48 1.338-.943.165-.466.165-.866.116-.948-.047-.084-.18-.133-.377-.233"/>
                    </svg>
                </div>
                <span>Atención Rápida</span>
            </a>
        </div>
    </div>
</header>