<?php

require_once('main.php');
	//ALMACENAMIENTO DE DATOS
    $usuario=limpiar_cadena($_POST['login_usuario']);
    $clave=limpiar_cadena($_POST['login_clave']);


    //VERIFICANDO CAMPOS
    if($usuario=="" || $clave==""){
        echo '
            <div class="badge badge-danger">
                <strong>¡ERROR!</strong><br>
                No has llenado todos los campos.
            </div>
        ';
        exit();
    }

    // VERIFICANDO INTEGRIDAD DE DATOS

    if(verificar_datos("[a-zA-Z0-9]{8,20}",$usuario)){
        echo '
            <div class="badge badge-danger">
                <strong>¡ERROR!</strong><br>
                El USUARIO no coincide con el formato solicitado.
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$clave)){
        echo '
            <div class="badge badge-danger">
                <strong>¡ERROR!</strong><br>
                La CLAVE no coincide con el formato solicitado.
            </div>
        ';
        exit();
    }

    $check_user=conexion();
    $check_user=$check_user->query("SELECT * FROM usuarios WHERE usuario_usuario='$usuario'");
    if($check_user->rowCount()==1){

        $check_user=$check_user->fetch();

        if($check_user['usuario_usuario']==$usuario && password_verify($clave, $check_user['usuario_clave'])){

        session_start();

            $_SESSION['id']=$check_user['usuario_id'];
            $_SESSION['nombre']=$check_user['usuario_nombre'];
            $_SESSION['apellido']=$check_user['usuario_apellido'];
            $_SESSION['usuario']=$check_user['usuario_usuario'];

            if(headers_sent()){
				echo "<script> window.location.href='../vista-administracion/publicar-producto.php'; </script>";
			}else{
				header("Location: ../vista-administracion/publicar-producto.php");
			}

        }else{
            echo '
                <div class="badge badge-danger">
                    <strong>¡ERROR!</strong><br>
                    Usuario o clave incorrectos.
                </div>
            ';
        }
    }else{
        echo '
            <div class="badge badge-danger">
                <strong>¡ERROR!</strong><br>
                Usuario o clave incorrectos.
            </div>
        ';
    }
    $check_user=null;