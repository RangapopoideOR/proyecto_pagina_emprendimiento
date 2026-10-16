<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Panel de Administración</title>
    <!-- Enlazamos tu archivo CSS unificado -->
    <link rel="stylesheet" href="../CSS/CSS_AdminPanel.css"">
</head>
<body class="login-body">

    <div class="login-contenedor">
        <div class="login-card">
            
            <!-- Encabezado / Logo -->
            <div class="login-header">
                <h2 class="logo">MI<span style="color: var(--color-ambar);">TIENDA</span></h2>
                <p>Ingresa tus credenciales para acceder al sistema</p>
            </div>

            <!-- Formulario de Login -->
            <form action="../php/iniciar_sesion.php" method="POST" class="FormularioAjax" autocomplete="off">
                
                <!-- Contenedor para alertas dinámicas de AJAX -->
                <div class="form-rest"></div>

                <div class="campo">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="login_usuario" placeholder="Ingresa tu usuario" required>
                </div>

                <div class="campo">
                    <label for="clave">Contraseña</label>
                    <input type="password" id="clave" name="login_clave" placeholder="••••••••" required>
                </div>

                <div class="login-btn-cont">
                    <button type="submit" class="login-btn">Entrar</button>
                </div>
                                <?php
                if(isset($_POST["login_usuario"]) && isset($_POST["login_clave"])){

                require_once"./php/main.php";
                require_once"./php/iniciar_sesion.php";
                }
                
                ?>
            </form>

            <div class="login-footer">
                <a href="../catalogo.php">&larr; Volver al Catálogo Público</a>
            </div>

        </div>
    </div>

</body>
</html>