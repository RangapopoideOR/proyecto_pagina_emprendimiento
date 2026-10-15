<!DOCTYPE html>
<html lang="en">

    <?php include('./includes/head.php');?>


<body>

    <?php include('./includes/header.php');?>

    <main>
        <div class="barra-navegacion">
            <ul>
                <li><a href="index.php">inicio</a></li>
                <li class="sigma">❯</li>
                <li><a href="#">sombreros</a></li>
                <li class="sigma">❯</li>
                <li>sombrero pelo de guama</li>
            </ul>
        </div>
        <section class="cont-producto-detalles-padre">
            <div class="cont-producto-detalles">
               
                <div class="img-vista-detalle">
                    <img src="img/sombrero-luffy.jpeg" alt="">
                </div>

                
                <div class="producto-detalles">
                    <div class="detalles-texto">
                        <h1 class="titulo-articulo">Sombrero Pelo De Guama</h1>
                        <p class="descripcion-corta">sombrero clasico de coleccion.</p>
                        <p class="precio-destacado">$65.00</p>
                        <span class="categoria-des">Categoría: sombreros</span>
                    </div>
                    
                    <div class="cont-btn-consultar">
                        <a href="#" class="btn-consultar">Consultar disponobilidad</a>
                    </div>
                </div>
            </div>
        </section>
        </main>
        
        <?php  include('./includes/footer.php');?>

    <script src="funciones_principales.js"></script>
    
</body>
</html>