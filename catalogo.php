
<!DOCTYPE html>
<html lang="en">

    <?php include('./includes/head.php');?>

<body>
    

    <?php include('./includes/header.php');?>





<main class="cat-principal">

        <!-- ENCABEZADO DE BIENVENIDA -->
        <section class="cat-hero">
            <h1 class="cat-titulo">Descubre Nuestra Colección</h1>
            <p class="cat-subtitulo">Encuentra los mejores productos con la mejor calidad y precio garantizado.</p>
        </section>

        <!-- BARRA DE FILTROS, BÚSQUEDA Y ORDEN -->
        <section class="cat-barra-herramientas">
            
            

            <!-- Filtro de Categoría (Select Estilizado) -->
            <div class="cat-control-item">
                <span class="cat-icono">🏷️</span>
                <select id="select-categoria" class="cat-select">
                    <option value="">Todas las Categorías</option>
                    <option value="electronica">⚡ Electrónica</option>
                    <option value="ropa">👕 Ropa & Moda</option>
                    <option value="hogar">🏠 Hogar & Decoración</option>
                    <option value="accesorios">⌚ Accesorios</option>
                </select>
            </div>

            <!-- Ordenar Por (Select Estilizado) -->
            <div class="cat-control-item">
                <span class="cat-icono">↕️</span>
                <select id="select-orden" class="cat-select">
                    <option value="recientes">Más recientes</option>
                    <option value="precio-bajo">Precio: Menor a Mayor</option>
                    <option value="precio-alto">Precio: Mayor a Menor</option>
                </select>
            </div>

        </section>

        <!-- GRILLA DE PRODUCTOS -->
        <section class="cat-grilla">

            <!-- Tarjeta 1 -->
            <article class="cat-card">
                <div class="cat-card-img-wrap">
                    <span class="cat-badge cat-badge-oferta">🔥 Oferta</span>
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&q=80" alt="Audífonos Bluetooth">
                </div>
                <div class="cat-card-body">
                    <span class="cat-categoria-tag">Electrónica</span>
                    <h3 class="cat-card-titulo">Audífonos Bluetooth Pro</h3>
                    <p class="cat-card-desc">Cancelación de ruido activa, sonido de alta definición y batería de 24 horas.</p>
                    <div class="cat-precio-box">
                        <span class="cat-precio">$45.00</span>
                        <span class="cat-precio-viejo">$60.00</span>
                    </div>
                    <button class="cat-btn-accion">Ver Detalles</button>
                </div>
            </article>

            <!-- Tarjeta 2 -->
            <article class="cat-card">
                <div class="cat-card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=500&q=80" alt="Camiseta Algodón">
                </div>
                <div class="cat-card-body">
                    <span class="cat-categoria-tag">Ropa</span>
                    <h3 class="cat-card-titulo">Camiseta Algodón Premium</h3>
                    <p class="cat-card-desc">Confeccionada con 100% algodón orgánico, suave, fresca y de alta durabilidad.</p>
                    <div class="cat-precio-box">
                        <span class="cat-precio">$18.50</span>
                    </div>
                    <button class="cat-btn-accion">Ver Detalles</button>
                </div>
            </article>

            <!-- Tarjeta 3 -->
            <article class="cat-card">
                <div class="cat-card-img-wrap">
                    <span class="cat-badge cat-badge-nuevo">✨ Nuevo</span>
                    <img src="https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=500&q=80" alt="Lámpara LED">
                </div>
                <div class="cat-card-body">
                    <span class="cat-categoria-tag">Hogar</span>
                    <h3 class="cat-card-titulo">Lámpara LED Moderna</h3>
                    <p class="cat-card-desc">Iluminación cálida y fría regulable con puerto USB para carga rápida.</p>
                    <div class="cat-precio-box">
                        <span class="cat-precio">$29.99</span>
                    </div>
                    <button class="cat-btn-accion">Ver Detalles</button>
                </div>
            </article>

            <!-- Tarjeta 4 -->
            <article class="cat-card">
                <div class="cat-card-img-wrap">
                    <span class="cat-badge cat-badge-agotado">Agotado</span>
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&q=80" alt="Reloj Inteligente">
                </div>
                <div class="cat-card-body">
                    <span class="cat-categoria-tag">Accesorios</span>
                    <h3 class="cat-card-titulo">Reloj Inteligente Sport</h3>
                    <p class="cat-card-desc">Monitoreo de ritmo cardíaco, resistencia al agua y GPS integrado.</p>
                    <div class="cat-precio-box">
                        <span class="cat-precio">$85.00</span>
                    </div>
                    <button class="cat-btn-accion desactivado" disabled>Agotado</button>
                </div>
            </article>

        </section>

    </main>










    <?php  include('./includes/footer.php');?>

</body>
</html>