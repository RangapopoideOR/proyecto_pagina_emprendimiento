<?php 
//CONEXION BASE DE DATOS

function conexion(){
        $pdo = new PDO("mysql:host=localhost;dbname=paginaweb","root","");
        return $pdo;
}

//VERIFICAR DATOS

    function verificar_datos($filtro,$cadena){
		if(preg_match("/^".$filtro."$/", $cadena)){
			return false;
        }else{
            return true;
        }
	}

    //LIMPIAR CADENA DE TEXTO 
	function limpiar_cadena($cadena){
		$cadena=trim($cadena);
		$cadena=stripslashes($cadena);
		$cadena=str_ireplace("<script>", "", $cadena);
		$cadena=str_ireplace("</script>", "", $cadena);
		$cadena=str_ireplace("<script src", "", $cadena);
		$cadena=str_ireplace("<script type=", "", $cadena);
		$cadena=str_ireplace("SELECT * FROM", "", $cadena);
		$cadena=str_ireplace("DELETE FROM", "", $cadena);
		$cadena=str_ireplace("INSERT INTO", "", $cadena);
		$cadena=str_ireplace("DROP TABLE", "", $cadena);
		$cadena=str_ireplace("DROP DATABASE", "", $cadena);
		$cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
		$cadena=str_ireplace("SHOW TABLES;", "", $cadena);
		$cadena=str_ireplace("SHOW DATABASES;", "", $cadena);
		$cadena=str_ireplace("<?php", "", $cadena);
		$cadena=str_ireplace("?>", "", $cadena);
		$cadena=str_ireplace("--", "", $cadena);
		$cadena=str_ireplace("^", "", $cadena);
		$cadena=str_ireplace("<", "", $cadena);
		$cadena=str_ireplace("[", "", $cadena);
		$cadena=str_ireplace("]", "", $cadena);
		$cadena=str_ireplace("==", "", $cadena);
		$cadena=str_ireplace(";", "", $cadena);
		$cadena=str_ireplace("::", "", $cadena);
		$cadena=trim($cadena);
		$cadena=stripslashes($cadena);
		return $cadena;
	}
    


	function paginador_tablas($pagina,$Npaginas,$url,$botones){

	$tabla='<link rel="stylesheet" href="./css/paginador.css">
                <nav class="paginador" role="navigation" aria-label="paginador">';

    if($pagina<=1){
		$tabla.= '<a class="paginador-p disable">Anterior</a>
                    <ul class="paginador-l">';
	} 
	else{
		$tabla.='<a class="paginador-p" href="'.$url.($pagina-1).'">Anterior</a>
                    <ul class="paginador-l">
                        <li><a class="paginador-link" href="'.$url.'1">1</a></li>
                        <li><span class="paginador-e"></span></li>';
	}

	$ci=0;
                for($i=$pagina; $i<=$Npaginas; $i++){
                    if($ci>=$botones){
                        break;

                    }
                    if($pagina==$i){
                        $tabla.='
                        <li><a class="paginador-link green" href="'.$url.$i.'">'.$i.'</a></li>
                        ';
                    }else{
                        $tabla.='
                        <li><a class="paginador-link" href="'.$url.$i.'">'.$i.'</a></li>';
                    }
                    $ci++;
                }
                if($pagina==$Npaginas){
                    $tabla.='
                    </ul>
                    <a class="paginador-n disable" disabled >Siguiente</a>
                    ';
                }else{
                    $tabla.='
                            <li><span class="paginador-e">&hellip;</span></li>
                            <li><a class="paginador-link" href="'.$url.$Npaginas.'">'.$Npaginas.'</a></li> 
                        </ul>
                        <a class="paginador-n" href="'.$url.($pagina+1).'">Siguiente</a>
                    ';
                }
                $tabla.='</nav>';
            return $tabla;
        }