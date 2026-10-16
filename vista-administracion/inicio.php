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
            <h2>INICIO</h2>
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

        
        
        <script src="funciones-admin.js"></script>