

<?php require_once dirname(__DIR__) . '/includes/acesso.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios</title>
    <!-- Hojas de estilo unificadas y separadas -->
    <link rel="stylesheet" href="../CSS/CSS_AdminPanel.css">
    <link rel="stylesheet" href="../CSS/CSS_Usuarios.css">
    <link rel="stylesheet" href="../CSS/paginador.css">
</head>
<body>
    <div class="contenedor">

    <!-- Barra Superior -->
        <div class="barra_superior">
            <button class="btn-menu-hamburguesa" onclick="toggleMenu()">☰</button>
            <h2>Lista de Usuarios</h2>
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

    <?php require_once('../php/main.php'); ?>

    <?php 
        if(!isset($_GET['page'])){
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];
            if($pagina<=1){
                $pagina=1;
            }
        }

        $usuario_id=(isset($_GET['usuario_id'])) ? $_GET['usuario_id'] : 0;

        $pagina=limpiar_cadena($pagina);
        $url="usuarios.php?page=";
        $registros=2;
        
        $inicio = ($pagina > 0) ? (($registros * $pagina) - $registros) : 0;

        $conexion = conexion();

        $consultar_datos = "SELECT * FROM usuarios ORDER BY usuario_id ASC LIMIT $inicio, $registros";
        $datos = $conexion->query($consultar_datos);
        $datos = $datos->fetchAll();

        $consulta_total = "SELECT COUNT(usuario_id) FROM usuarios";
        $total = $conexion->query($consulta_total);
        $total = $total->fetchColumn();

        $Npaginas = ceil($total / $registros);
    ?>
        
        <!-- Contenido Principal -->
        <div class="contenido_contenedor">

            <div class="barra-acciones">
                <h3>Lista de Usuarios Registrados</h3>
                <a href="#" class="btn-detalles" onclick="abrirModal(event)">Nuevo Usuario</a>
            </div>
            
            <!-- Tabla de Datos de Usuarios -->
            <div class="panel-contenedor">
                <div class="tabla-responsive">
                    <table class="tabla-usuarios">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Usuario</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($total >= 1 && $pagina <= $Npaginas) {
                                foreach($datos as $rows) {  
                            ?>
                                <tr>
                                    <td><?php echo $rows['usuario_id']; ?></td>
                                    <td class="usuario-nombre"><?php echo $rows['usuario_nombre']; ?></td>
                                    <td><?php echo $rows['usuario_apellido']; ?></td>
                                    <td><span class="badge badge-admin"><?php echo $rows['usuario_usuario']; ?></span></td>
                                    <td class="text-center">
                                        <a href="#" class="btn-accion btn-editar">Editar</a>
                                        <a href="#" class="btn-accion btn-eliminar">Eliminar</a>
                                    </td>
                                </tr>
                            <?php 
                                }
                            } else {
                                echo '<tr><td colspan="5" class="has-text-centered">No hay registros en el sistema</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <?php 
                if($total >= 1) {
                    echo '<p class="has-text-centered"><a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">Haga clic acá para recargar el listado</a></p>';
                }

                $conexion = null;

                if($total >= 1 && $pagina <= $Npaginas) {
                    echo paginador_tablas($pagina, $Npaginas, $url, 7);
                }
                ?>
            </div> 

        </div>
        
    </div>

    <!-- Modal para Nuevo Usuario -->
    <div id="modal-producto" class="modal-cont" style="display: none;">
        <div class="modal-contenido">
            <span class="btn-cerrar" onclick="cerrarModal()">&times;</span>
            <div class="modal-cuerpo">
                <div class="modal-detalles">
                    <div class="detalles-texto">
                        <form action="../php/guardar_usuario.php" method="POST" class="FormularioAjax formulario-principal" autocomplete="off">
                            <div class="form-rest"></div>

                            <div class="formulario-cont">
                                <div class="campo">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
                                </div>

                                <div class="campo">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" id="apellido" name="apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
                                </div>

                                <div class="campo">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" id="usuario" name="usuario" pattern="[a-zA-Z0-9 ]{3,40}" maxlength="40" required>
                                </div>

                                <div class="campo">
                                    <label for="contrasena">Contraseña</label>
                                    <input type="password" id="contrasena" name="contrasena" pattern="[a-zA-Z0-9 ]{3,40}" maxlength="40" required>
                                </div>

                                <div class="campo">
                                    <label for="confirmar_contrasena">Confirmar Contraseña</label>
                                    <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" pattern="[a-zA-Z0-9 ]{3,40}" maxlength="40" required>
                                </div>
                            </div>
                            
                            <div>
                                <button type="submit" class="button is-success">Publicar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="funciones-admin.js"></script>
    <script src="../js/ajax.js"></script>
</body>
</html>