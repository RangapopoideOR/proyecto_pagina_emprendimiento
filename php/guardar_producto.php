// no listo //

<?php 

require_once "main.php";

/*ALMACENANDO DATOS*/ 

$nombre = limpiar_cadena( $_POST["nombre"] );
$descripcion = limpiar_cadena( $_POST["descripcion"] );
$precio = limpiar_cadena($_POST["precio"]);
$categoria = limpiar_cadena( $_POST["categoria"] );

/*VERIFICANDO DATOS*/ 

if( $nombre=="" || $descripcion=="" || $precio=="" || $categoria==""  ){
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

if(verificar_datos("[a-zA-Z0-9 ]{5,50}", $descripcion)){
    echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                La DESCRIPCION no coincide con el formato solicitado.
            </div>
        ';
        exit();

}

if(verificar_datos("[0-9]{2,20}", $precio)){
    echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                El PRRECIO no coincide con el formato solicitado.
            </div>
        ';
        exit();
}

$check_nombre = conexion();
$check_nombre = $check_nombre->query("SELECT nombre_producto FROM catalogo WHERE nombre_producto='$nombre'");
if($check_nombre->rowCount()>0){
    echo '
            <div class="badge badge-danger">
                <strong>¡ERROR!</strong><br>
                El NOMBRE ingresado ya se encuentra registrado, por favor introduzca otro.
            </div>
        ';
        exit();
}
$check_nombre=null;


$check_categoria=conexion();
$check_categoria=$check_categoria->query("SELECT id_categoria FROM categorias WHERE id_categoria='$categoria'");
if($check_categoria->rowCount()<=0){

echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                La CATEGORIA ingresada no existe.
            </div>
        ';
        exit();
}
$check_categoria=null;


