
<!DOCTYPE html>
<html lang="en">

    <?php include('./includes/head.php');?>
    <?php require_once('php/main.php'); ?>
<body>
    

    <?php include('./includes/header.php');?>


<?php 
                        

if(!isset($_GET['page'])){
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];
            if($pagina<=1){
                $pagina=1;
            }
        }

        $categoria_id=(isset($_GET['category_id'])) ? $_GET['category_id'] : 0;

        $pagina=limpiar_cadena($pagina);
        $url="catalogo.php?vista=product_list&page=";
        $registros=2;
        $busqueda="";
?>


<?php 
        $inicio = ($pagina>0)? ( ($registros * $pagina) - $registros) : 0;
$tabla = "";

$busqueda = isset($_REQUEST['buscador']) ? $_REQUEST['buscador'] : (isset($_GET['busqueda']) ? $_GET['busqueda'] : "");



if(isset($_POST['buscador'])){
        $busqueda = $_POST['buscador'];
    } elseif(isset($_GET['busqueda'])){ 
        $busqueda = $_GET['busqueda'];
    }

    $campos = "catalogo.nombre_producto, catalogo.id_producto, catalogo.descripcion_producto, catalogo.precio_producto, catalogo.img_producto, categorias.nombre_categoria";

    if (isset($busqueda) && $busqueda!= ""){

    $consulta_datos= "SELECT $campos FROM catalogo INNER JOIN categorias ON catalogo.id_categoria=categorias.id_categoria WHERE catalogo.nombre_producto	LIKE '%$busqueda%' OR catalogo.descripcion_producto	LIKE '%$busqueda%' ORDER BY producto.nombre_producto ASC LIMIT $inicio,$registros";

    $consulta_total="SELECT COUNT(id_producto) FROM catalogo WHERE nombre_producto LIKE '%$busqueda%'";

}elseif($categoria_id>0){
        $consulta_datos="SELECT $campos FROM catalogo INNER JOIN categorias ON catalogo.id_categoria=categorias.id_categoria  WHERE catalogo.id_categoria='$categoria_id' ORDER BY catalogo.nombre_producto ASC LIMIT $inicio,$registros";

        $consulta_total="SELECT COUNT(id_producto) FROM catalogo WHERE id_categoria='$categoria_id'";
    }else{
        $consulta_datos="SELECT $campos FROM catalogo INNER JOIN categorias ON catalogo.id_categoria=categorias.id_categoria ORDER BY catalogo.nombre_producto ASC LIMIT $inicio,$registros";

        $consulta_total="SELECT COUNT(id_producto) FROM catalogo";
    }

?>

<?php  $conexion=conexion();

    $datos=$conexion->query($consulta_datos);
    $datos=$datos->fetchAll();

    $total=$conexion->query($consulta_total);
    $total=(int) $total->fetchColumn();

    $Npaginas=ceil($total/$registros);

    
    ?>

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
                <select id="categoria" name="categoria" class="cat-select">
                            <option value="" selected disabled>Seleccione una categoría...</option>
                            <?php
                            try {
                                $conexion_db = conexion();
                                if ($conexion_db) {
                                    $consulta = $conexion_db->query('SELECT * FROM categorias');
                                    if ($consulta && $consulta->rowCount() > 0) {
                                        $categorias = $consulta->fetchAll();
                                        foreach ($categorias as $row) {
                                            echo '<option value="' . $row['id_categoria'] . '">' . $row['nombre_categoria'] . '</option>';
                                        }
                                    }
                                }
                            } catch (\Throwable $th) {
                                echo '<option value="" disabled>Error al cargar categorías</option>';
                            }
                            ?>
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


            <form action="tienda.php" method="GET" class="cont-buscador">
    <input type="text" name="q" placeholder="Buscar producto..." required autocomplete="off">
    <button type="submit" aria-label="Buscar">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
    </button>
</form>

        </section>

        <!-- GRILLA DE PRODUCTOS -->
        <section class="cat-grilla">

<?php            if($total>=1 && $pagina<=$Npaginas){
        $contador=$inicio+1;
        $pag_inicio=$inicio+1;
        foreach($datos as $rows){   
            ?>
            <article class="cat-card">
                <div class="cat-card-img-wrap">
                    <span class="cat-badge cat-badge-oferta">🔥 Oferta</span>
                    <?php  if(is_file("img/productos/".$rows['img_producto'])){
                            echo'<img src="img/productos/'.$rows['img_producto'].'">';
                        }else{
                            echo'<img src="./img/producto.png">';
                        }?>
                </div>
                <div class="cat-card-body">
                    <span class="cat-categoria-tag"> <?php echo $rows['nombre_categoria'] ?></span>
                    <h3 class="cat-card-titulo"><?php echo $rows['nombre_producto'] ?></h3>
                    <p class="cat-card-desc"><?php echo $rows['descripcion_producto'] ?></p>
                    <div class="cat-precio-box">
                        <span class="cat-precio"><?php echo $rows['precio_producto']."$"; ?></span>
                    </div>
                    <button class="cat-btn-accion">Ver Detalles</button>
                </div>
            </article>

<?php
$contador++;
        }
        $pag_final=$contador-1;
    }else{
        if($total>=1){
            $tabla.='
            <p class="has-text-centered">
                <a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
                    Haga clic acá para recargar el listado
                </a>
            </p>
            ';
        }else{
            $tabla.='<p class="has-text-centered">No hay registros en el sistema</p>';
        }
    }

    // if($total>=1 && $pagina<=$Npaginas){
    //     $tabla.='<p class="has-text-right">Mostrando productos <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
    // }

    // $conexion=null;
    // echo $tabla;

    // if($total>=1 && $pagina<=$Npaginas){
    //     echo paginador_tablas($pagina,$Npaginas,$url,7);
    // }

?>


    </main>










    <?php  include('./includes/footer.php');?>

</body>
</html>