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
<?php require_once dirname(__DIR__) . '/includes/acesso.php'; ?>
    <div class="contenedor">

        <!-- Barra Superior -->
        <div class="barra_superior">
            <h2>configuracion</h2>
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
                    
                    <a href="ofertas.php"><li class="modulo">ofertas</li></a>
                    
                    
                    <li class="select">configuracion</li>
                </ul>
                <ul>
                    <li class="modulo">Administrar pagina</li>
                    <li><a href="logout.php">cerrar sesion</a></li>
                </ul>
            </div>

        </div>

<div class="cuerpo-contenido">
            
            <!-- Fila superior: Apariencia y Datos del Local -->
            <div class="rejilla-tarjetas-superiores">
                
                <!-- Tarjeta Apariencia -->
                <div class="tarjeta">
                    <div class="cabecera-tarjeta">
                        <i class="fa-solid fa-palette"></i>
                        <span>Apariencia</span>
                    </div>
                   <div class="grupo-formulario">
                      <label for="color-sistema">Color del Sistema</label>
                         <div class="caja-selector-color">
                         <input type="color" id="color-sistema" class="selector-color-input" value="#3182ce">
                            <div class="descripcion-color">
        
                                </div>
                              </div>
                    </div>
                </div>

                <!-- Tarjeta Datos del Local -->
                <div class="tarjeta">
                    <div class="cabecera-tarjeta">
                        <i class="fa-solid fa-store"></i>
                        <span>Datos del Local</span>
                    </div>
                    <div class="grupo-formulario">
                        <label for="nombre-empresa">Nombre de la Empresa</label>
                        <input type="text" id="nombre-empresa" class="control-formulario" value="ej: mi tienda">
                    </div>
                </div>

            </div>

            <!-- Fila inferior: Configuración de Factura/Ticket -->
            <div class="tarjeta-ancho-completo">
                <div class="cabecera-tarjeta">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span>Configuración de Factura/Ticket</span>
                </div>

                <div class="grupo-formulario grupo-rif">
                    <label for="rif">RIF / Documento</label>
                    <input type="text" id="rif" class="control-formulario" value="ej:J-12345678-9">
                </div>

                <div class="grupo-formulario">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" class="control-formulario" value="ej:Av. Principal">
                </div>

                <div class="grupo-formulario">
                    <label for="mensaje">Mensaje de Agradecimiento (Pie de página)</label>
                    <textarea id="mensaje" class="control-formulario">Gracias por su compra!</textarea>
                </div>
            </div>

            <!-- Botón Guardar Configuración -->
            <div class="contenedor-acciones">
                <button class="boton-primario">
                    <i class="fa-solid fa-floppy-disk"></i> Guardar Configuración
                </button>
            </div>

        </div>
        