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
            <h2>ofertas</h2>
        </div>
        
        <!-- Panel Izquierdo -->
        <div class="modulo_contenedor">
            <div class="logo_cont">
                <h2 class="logo">[LOGO TIENDA]</h2>
            </div>
            
            <div class="modulos">
                <ul>
                     
                    <a href="catalogo.php"><li class="modulo">catálogo</li></a>
  
                    <a href="categorias.php"><li class="modulo">categorias</li></a>
                    
                <li class="select">ofertas</li>
                    
                    <a href="configuracion.php"><li class="modulo">configuración</li></a>
                     
                </ul>
                <ul>
                    <li class="modulo">Administrar pagina</li>
                </ul>
            </div>

        </div>
        
        <!-- Contenido Principal -->
        <div class="contenido_contenedor">

            <div class="barra-acciones">
                <h3>Productos en ofertas: 2</h3>
                <div style="display: flex; align-items: center;gap: 10px;">
                    <div>
                        <a href="publicar-producto.php" class="btn-publicar">crear oferta</a>
                    </div>
                    <div class="buscador">
                        <input type="text" id="buscador" placeholder="buscar ofertas...">
                    </div>
                </div>
            </div>
            
            <!--DISEÑO TIPO PANEL -->
            <div class="panel-contenedor">
                
                
                <div class="tarjeta-producto">
                    
                    <div class="tarjeta-header">
                        <span class="badge-id">ID: 0102</span>
                        <span class="badge-categoria">Rones</span>
                    </div>

                    <div class="tarjeta-body">
                        <h3 class="nombre-producto">Cacique</h3>
                        <p class="precio-producto">$12</p>
                    </div>

                    <div class="tarjeta-footer">
                        <a href="#" class="btn-detalles" onclick="abrirModal(event)">Ver detalles</a>
                    </div>
                </div>

            </div> 

        </div>
        
    </div>

</body>
</html>