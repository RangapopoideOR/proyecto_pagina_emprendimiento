<!DOCTYPE html>
<html lang="en">

    <?php include('./includes/head.php');?>

<body>
    

    <?php include('./includes/header.php');?>


    <main>
       <section class="hero">
            <div class="hero-content">
                <h1 class="hero-title">Encuentra la mejor calidad en nuestro catálogo</h1>
                <p class="hero-subtitle">
                Descubre nuestra amplia selección de productos diseñados especialmente para ti.
                </p>
                <div class="hero-buttons">
                <a href="#catalogo" class="btn btn-primary">Ver catálogo</a>
                </div>
            </div>
        </section>

        <section>
            <div class="contenido-seccion">
                <div class="seccion-titulo" id="catalogo">
                    <h2>Sombreros</h2>
                </div>

                <div class="carrusel-productos">

                    <button class="btn-scroll left" id="btn-left">❮</button>

                    <div class="cont-productos" id="cont-productos">

                        <a href="producto-detalle.php" class="producto">
                            <div class="producto-img">
                                <img src="img/sombrero-luffy.jpeg" alt="">
                            </div>
    
                            <div class="producto_info">
                                <h3>sombrero pelo de guama</h3>
                                <div class="precio">
                                    <span class="precio-actual">$65.00</span>                            
                                </div>
                            </div>
                        </a>

                        <a href="producto-detalle.php" class="producto">
                            <div class="producto-img">
                                <img src="img/sombrero-luffy.jpeg" alt="">
                            </div>
    
                            <div class="producto_info">
                                <h3>sombrero pelo de guama</h3>
                                <div class="precio">
                                    <span class="precio-actual">$65.00</span>                            
                                </div>
                            </div>
                        </a>

                        <a href="producto-detalle.php" class="producto">
                            <div class="producto-img">
                                <img src="img/sombrero-luffy.jpeg" alt="">
                            </div>
    
                            <div class="producto_info">
                                <h3>sombrero pelo de guama</h3>
                                <div class="precio">
                                    <span class="precio-actual">$65.00</span>                            
                                </div>
                            </div>
                        </a>

                        <a href="producto-detalle.php" class="producto">
                            <div class="producto-img">
                                <img src="img/sombrero-luffy.jpeg" alt="">
                            </div>
    
                            <div class="producto_info">
                                <h3>sombrero pelo de guama</h3>
                                <div class="precio">
                                    <span class="precio-actual">$65.00</span>                            
                                </div>
                            </div>
                        </a>

                        <a href="producto-detalle.php" class="producto">
                            <div class="producto-img">
                                <img src="img/sombrero-luffy.jpeg" alt="">
                            </div>
    
                            <div class="producto_info">
                                <h3>sombrero pelo de guama</h3>
                                <div class="precio">
                                    <span class="precio-actual">$65.00</span>                            
                                </div>
                            </div>
                        </a>
                        
                    </div>

                    <button class="btn-scroll right" id="btn-right">❯</button>

                </div>


            </div>
        </section>
    </main>


    <?php  include('./includes/footer.php');?>

    <script src="funciones_principales.js"></script>
</body>
</html>