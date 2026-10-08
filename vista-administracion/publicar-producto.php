<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="../CSS/CSS_AdminPanel.css">
<?php include('../includes/head.php');?>
<body>



    <?php require_once('../php/main.php');?>

    <div class="contenedor">

        <!-- Barra Superior -->
        <div class="barra_superior">
            <h2><a href="catalogo.php">catálogo</a> > publicar</h2>
        </div>
        
        <!-- Panel Izquierdo -->
        <div class="modulo_contenedor">
            <div class="logo_cont">
                <h2 class="logo">[LOGO TIENDA]</h2>
            </div>
            
            <div class="modulos">
                <ul>
                    <li class="select">catálogo</li>
                    <ul class="sub-modulos">
                        <li>administrar</li>
                        <li>publicar producto</li>
                    </ul>

                    <li class="modulo">categorias</li>
                    <ul class="sub-modulos">
                        <li>administrar</li>
                        <li>nueva categoria</li>
                    </ul>

                    <li class="modulo">ofertas</li>
                    <ul class="sub-modulos">
                        <li>administrar</li>
                        <li>nueva oferta</li>
                    </ul>
                </ul>
                <ul>
                    <li class="modulo">Administrar pagina</li>
                </ul>
            </div>

        </div>
        
      
        <div class="contenido_contenedor">
            
           
            <form  action="../php/guardar_producto.php" method="POST" class="FormularioAjax formulario-principal" autocomplete="off" enctype="multipart/form-data"
            >
                
                <div class="formulario-cont">
                    
                    <div class="campo">
                        <label for="producto">Producto</label>
                        <input type="text" id="producto" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
                    </div>

                    <div class="campo">
                        <label for="descripcion">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" pattern="[a-zA-Z0-9 ]{5,50}" maxlength="80" required>
                    </div>

                    <div class="campo">
                        <label for="precio">Precio</label>
                        <input type="text" id="precio" name="precio" pattern="[0-9]{1,20}" maxlength="20" required>
                    </div>

                    <div class="campo">
                        <label for="categoria">Categoría</label>
                        <select id="categoria" name="categoria">
                            <option value=""  selected"">Seleccione una categoría...</option>
                            
                            <?php
                            $categorias=conexion();
                            $categorias=$categorias->query('SELECT * FROM categorias');

                            if($categorias->rowCount()>0){
                                $categorias=$categorias->fetchAll();
                                foreach($categorias as $row){
                                    echo'<option value="'.$row['id_categoria'].'">'.$row['nombre_categoria'].'</option>';

                                }
                            }
                            $categorias=null;
                            ?>


                        </select>
                    </div>

                    
                </div>
                
                <div class="formulario-cont-2">
                    
                    <label class="cont-img" for="input-imagen">
                        <h2 id="texto-imagen">IMAGEN</h2>
                        <input type="file" id="input-imagen" accept="image/*" style="display: none;">
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




</body>
</html>