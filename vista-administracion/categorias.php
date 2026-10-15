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
                <h3>categorias: 2</h3>
                <div style="display: flex; align-items: center;gap: 10px;">
                    <div>
                        <a href="#" class="btn-publicar">+ nueva categoria</a>
                    </div>
                    <div class="buscador">
                        <input type="text" id="buscador" placeholder="buscar categorias...">
                    </div>
                </div>
            </div>
            
            <!--DISEÑO TIPO PANEL -->
            <div class="panel-contenedor-categorias">

                <div class="tarjeta-categoria">
                    <div class="tarjeta-categoria-header">
                        <h3 class="nombre-producto">Categoría</h3>
                    </div>
                    
                    <div class="tarjeta-categoria-body">
                        <p class="precio-producto">Productos: 6</p>
                    </div>

                    <div class="tarjeta-categoria-footer">
                        <a href="#" class="btn-detalles">Ver detalles</a>
                    </div>
                </div>

                <div class="tarjeta-categoria">
                    <div class="tarjeta-categoria-header">
                        <h3 class="nombre-producto">Categoría</h3>
                    </div>
                    
                    <div class="tarjeta-categoria-body">
                        <p class="precio-producto">Productos: 6</p>
                    </div>

                    <div class="tarjeta-categoria-footer">
                        <a href="#" class="btn-detalles">Ver detalles</a>
                    </div>
                </div>

            </div> 
            

        </div>
        
    </div>

 <script src="funciones-admin.js"></script>
</body>
</html>