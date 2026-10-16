<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$dbname = 'paginaweb';
$username = 'root';
$password = '';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener las categorías y contar cuántos productos tiene cada una
    $query = "SELECT c.id_categoria, c.nombre_categoria, COUNT(p.id_producto) AS total_productos 
              FROM categorias c 
              LEFT JOIN catalogo p ON c.id_categoria = p.id_categoria 
              GROUP BY c.id_categoria, c.nombre_categoria";
    
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Total de categorías encontradas
    $total_categorias = count($categorias);

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    $categorias = [];
    $total_categorias = 0;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Catálogo</title>
    <!-- <link rel="stylesheet" href="../CSS/CSS_Usuarios.css"> -->
    <link rel="stylesheet" href="../CSS/CSS_AdminPanel.css">
</head>
<body>
    <div class="contenedor">

        <!-- Barra Superior -->
        <div class="barra_superior">
            <button class="btn-menu-hamburguesa" onclick="toggleMenu()">☰</button>
            <h2>categorias</h2>
        </div>
        
        <!-- Panel Izquierdo -->
        <div class="modulo_contenedor">
            <div class="logo_cont">
                <h2 class="logo">[LOGO TIENDA]</h2>
            </div>
            
            <div class="modulos">
                <ul>
                    <a href="catalogo.php"><li class="modulo">catálogo</li></a>
                    <li class="select">categorias</li>
                    <a href="ofertas.php"><li class="modulo">ofertas</li></a>
                </ul>
                <ul>
                    <li class="modulo">Administrar pagina</li>
                </ul>
            </div>

        </div>
        
        <!-- Contenido Principal -->
        <div class="contenido_contenedor">

            <div class="barra-acciones">
                <h3>categorias: <?php echo $total_categorias; ?></h3>
                <div style="display: flex; align-items: center;gap: 10px;">
                    <div>
                        <a href="#" class="btn-publicar" onclick="abrirModal(event)">+ nueva categoria</a>
                    </div>
                    <div class="buscador">
                        <input type="text" id="buscador" placeholder="buscar categorias...">
                    </div>
                </div>
            </div>
            
            <!--DISEÑO TIPO PANEL -->
            <div class="panel-contenedor-categorias">

                <?php if ($total_categorias > 0): ?>
                    <?php foreach ($categorias as $cat): ?>
                        <div class="tarjeta-categoria">
                            <div class="tarjeta-categoria-header">
                                <h3 class="nombre-producto"><?php echo htmlspecialchars($cat['nombre_categoria']); ?></h3>
                            </div>
                            
                            <div class="tarjeta-categoria-body">
                                <p class="precio-producto">Productos: <?php echo $cat['total_productos']; ?></p>
                            </div>

                            <div class="tarjeta-categoria-footer">
                                <a href="detalles_categoria.php?id=<?php echo $cat['id_categoria']; ?>" class="btn-detalles">Ver detalles</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay categorías registradas.</p>
                <?php endif; ?>

            </div> 

        </div>
        
    </div>

     <div id="modal-producto" class="modal-cont" style="display: none;">
        
        <!-- Contenedor principal del Modal -->
        <div class="modal-contenido">
            
            <!-- Botón para cerrar-->
            <span class="btn-cerrar" onclick="cerrarModal()">&times;</span>

          
           
            </div>
        </div>
    </div>

 <script src="funciones-admin.js"></script>
</body>
</html>