<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Producto</title>
    <link rel="stylesheet" href="../CSS/CSS_AdminPanel.css">
</head>
<body>

<?php require_once dirname(__DIR__) . '/includes/acesso.php'; ?>
    <?php require_once('../php/main.php'); ?>

    <div class="contenedor">


    <!-- Barra Superior -->
        <div class="barra_superior">
            <button class="btn-menu-hamburguesa" onclick="toggleMenu()">☰</button>
            <h2>publicar producto</h2>
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
                    <li><a href="logout.php">cerrar sesion</a></li>
                </ul>
            </div>

        </div>

        
        
      
        <div class="contenido_contenedor">
            
            <form action="../php/guardar_producto.php" method="POST" class="FormularioAjax formulario-principal" autocomplete="off" enctype="multipart/form-data">
                <div class="form-rest"></div>

                <div class="formulario-cont">
                    <div class="campo">
                        <label for="producto">Producto</label>
                        <input type="text" id="producto" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
                    </div>

                    <div class="campo">
                        <label for="descripcion">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" pattern="[a-zA-Z0-9 ]{5,110}" maxlength="80" required>
                    </div>

                    <div class="campo">
                        <label for="precio">Precio</label>
                        <input type="text" id="precio" name="precio" pattern="[0-9]{1,20}" maxlength="20" required>
                    </div>

                    <div class="campo">
                        <label for="categoria">Categoría</label>
                        <select id="categoria" name="categoria" required>
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
                </div>
                
                <div class="formulario-cont-2">
                    <label class="cont-img" for="input-imagen">
                        <h2 id="texto-imagen">IMAGEN</h2>
                        <input type="file" id="input-imagen" name="producto_foto" accept=".jpg, .png, .jpeg" style="display: none;">
                        <img id="vista-previa" src="" alt="Vista previa de producto" style="display: none;">
                    </label>

                    <div class="boton-cont">
                        <button type="submit">Publicar</button>
                    </div>
                </div>
                
            </form>

        </div>
        
    </div>

    <script>
        const inputImagen = document.getElementById('input-imagen');
        const vistaPrevia = document.getElementById('vista-previa');
        const textoImagen = document.getElementById('texto-imagen');

        inputImagen.addEventListener('change', function(evento) {
            const archivo = evento.target.files[0];
            if (archivo) {
                const lector = new FileReader();
                lector.onload = function(e) {
                    vistaPrevia.src = e.target.result;
                    vistaPrevia.style.display = 'block'; 
                    textoImagen.style.display = 'none';  
                }
                lector.readAsDataURL(archivo);
            }
        });
    </script>

    <script src="../js/ajax.js"></script>
    <script src="funciones-admin.js"></script>
</body>
</html>