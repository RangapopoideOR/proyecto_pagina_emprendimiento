
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

#directorio de imagenes#
$imgDirectorio = '../img/productos';

if($_FILES['producto_foto']['name']!="" && $_FILES['producto_foto']['size']>0){

    #creando directorio#

    if(!file_exists($imgDirectorio)){
        if(!mkdir($imgDirectorio,0777)){
            echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                Error al CREAR el directorio.
            </div>
        ';
        exit();
        }
    }

    #verificando formato de las imagenes#

    if(mime_content_type($_FILES['producto_foto']['tmp_name'])!="image/jpeg" && 
    mime_content_type($_FILES['producto_foto']['tmp_name'])!="image/png" ){
        echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                La IMAGEN seleccionada es de un formato no permitido.
            </div>
        ';
        exit();

    }

    #verificar peso de imagen (5mb)#

    if(($_FILES['producto_foto']['size']/1024)>5120){
        echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                La IMAGEN seleccionada supera el peso permitido.
            </div>
        ';
        exit();
    }

    #extension de la imagen#
    switch(mime_content_type($_FILES['producto_foto']['tmp_name'])){
        case 'image/jpeg';
        $img_ext=".jpg";
        break;

        case 'image/png';
        $img_ext=".png";
        break;
    }

    chmod($imgDirectorio,0777);

    $img_nombre=renombrar_fotos($nombre);
    $foto=$img_nombre.$img_ext;

    #moviendo imagen a directorio#
    if(!move_uploaded_file($_FILES['producto_foto']['tmp_name'],$imgDirectorio.'/'.$foto)){
        echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                No fue posible subir la IMAGEN.
            </div>
        ';
        exit();
    }

}else{
    $foto="";
}

#guardando datos#

$guardar_producto=conexion();
$guardar_producto=$guardar_producto->prepare( "INSERT INTO catalogo(nombre_producto, descripcion_producto, precio_producto, img_producto, id_categoria) VALUES (:nombre, :descripcion, :precio, :foto, :categoria)");

$marcadores=[
    ":nombre"=>$nombre,
    ":descripcion"=>$descripcion,
    ":precio"=>$precio,
    ":foto"=>$foto,
    ":categoria"=>$categoria
];

$guardar_producto->execute($marcadores);

if($guardar_producto->rowCount()==1){
        echo '
            <div class="">
                <strong>PRODUCTO REGISTRADO</strong><br>
                El producto fue registrado con exito.
            </div>
        ';
}else{
    if(is_file($imgDirectorio.$foto)){
        chmod($imgDirectorio.$foto,0777);
        unlink($imgDirectorio.$foto);
    }
    echo '
            <div class="">
                <strong>¡ERROR!</strong><br>
                No fue posible registrar el PRODUCTO.
            </div>
        ';
        exit();
}