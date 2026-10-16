
<?php 

require_once "main.php";

/*ALMACENANDO DATOS*/ 

$nombre = limpiar_cadena( $_POST["nombre"] );
$apellido = limpiar_cadena( $_POST["apellido"] );
$usuario = limpiar_cadena($_POST["usuario"]);
$contrasena = limpiar_cadena($_POST["contrasena"]);
$confirmar_contrasena = limpiar_cadena($_POST["confirmar_contrasena"]);

/*VERIFICANDO DATOS*/ 

if( $nombre=="" || $apellido=="" || $usuario=="" || $contrasena=="" || $confirmar_contrasena=="" ){
    echo '<div class=" clase de la alerta (aun no existe)"> ¡ERROR! No llenaste todos los campos. </div>';
        exit();
}

if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $nombre)){
    echo '
            <div class="  ">
                <strong>¡ERROR!</strong><br>
                El NOMBRE no coincide con el formato solicitado.
            </div>
        ';
        exit();
}

if(verificar_datos("[a-zA-Z0-9 ]{5,50}", $apellido)){
    echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                El APELLIDO no coincide con el formato solicitado.
            </div>
        ';
        exit();

}

if(verificar_datos("[a-zA-Z0-9 ]{5,50}", $usuario)){
    echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                El USUARIO no coincide con el formato solicitado.
            </div>
        ';
        exit();
}

if(verificar_datos("[a-zA-Z0-9 ]{5,50}", $contrasena)){
    echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                La CONTRASEÑA no coincide con el formato solicitado.
            </div>
        ';
        exit();
}

if($contrasena !== $confirmar_contrasena){
    echo '
            <div class="badge badge-danger">
                <strong>¡ERROR!</strong><br>
                Las CONTRASEÑAS no coinciden.
            </div>
        ';
        exit();
}


$check_usuario = conexion();
$check_usuario = $check_usuario->query("SELECT usuario_usuario FROM usuarios WHERE usuario_usuario='$usuario'");
if($check_usuario->rowCount()>0){
    echo '
            <div class="badge badge-danger">
                <strong>¡ERROR!</strong><br>
                El USUARIO ingresado ya se encuentra registrado, por favor introduzca otro.
            </div>
        ';
        exit();
}
$check_nombre=null;

$check_contrasena = conexion();
$check_contrasena = $check_contrasena->query("SELECT usuario_clave FROM usuarios WHERE usuario_clave='$contrasena'");
if($check_contrasena->rowCount()>0){
    echo '
            <div class="badge badge-danger">
                <strong>¡ERROR!</strong><br>
                La CONTRASEÑA ingresada ya se encuentra registrada, por favor introduzca otra.
            </div>
        ';
        exit();
}
 $clave = password_hash($contrasena, PASSWORD_BCRYPT, ["cost"=>10]);
#guardando datos#

$guardar_usuario=conexion();
$guardar_usuario=$guardar_usuario->prepare( "INSERT INTO usuarios(usuario_nombre, usuario_apellido, usuario_usuario, usuario_clave) VALUES (:nombre, :apellido, :usuario, :contrasena)" );

$marcadores=[
    ":nombre"=>$nombre,
    ":apellido"=>$apellido,
    ":usuario"=>$usuario,
    ":contrasena"=>$clave
];

$guardar_usuario->execute($marcadores);

if($guardar_usuario->rowCount()==1){
        echo '
            <div class="">
                <strong>USUARIO REGISTRADO</strong><br>
                El usuario fue registrado con exito.
            </div>
        ';
}else{
    echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                No fue posible registrar el USUARIO.
            </div>
        ';
        exit();
}

