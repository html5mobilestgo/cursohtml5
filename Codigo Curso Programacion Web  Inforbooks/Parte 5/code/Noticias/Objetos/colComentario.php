<?php
// colComentario.php

class ColComentario
{
// en esta variable privada se almacenan todos los objetos
// comentario
private $Coms = Array();


function __construct( $inot ) {
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

	// sentencia SELECT para leer todos los comentarios
	$sql = "Select * From ";
	$sql.= "Comentario Where CAId ='$inot' Order by CFecha Desc" ;
	$rst = $db->ejecutarSQL($sql);
         
	while( $fila = $db->SiguienteFila($rst)) {
		// carga de elementos Comentario
		// uso del constructor parametrizado
		$this->Coms[] = new Comentario( $fila['CAId'],
			$fila['CUsuario'],
			$fila['CTexto'],
			$fila['CFecha']);
	}
	// al finalizar de utilizar el conjunto de resultados lo
	// liberamos
	$db->liberarRecursos( $rst );

}
function cantComentarios() {
	// devuelve la cantidad de comentarios de una noticia
	return count($this->Coms);
}


function obtenerLista() {
	// producimos el código HTML con la sentencia Select
	// de encabezamiento
	print("<select name =\"Coms\">\n");

	foreach( $this->Coms as $elem ) {
		print("<option value=\"".$elem->getCId()."\">".$elem->getCTexto()."</option>\n");
	}

	// cerrar la instrucción select
	print("</select>\n");
}


function visualizarTodos() {
	$str ="";
	// recorremos toda la matriz con foreach
	foreach( $this->Coms as $elem ) {
 		$str .= $elem->visualizar();
	}

	// devuelve toda la cadena
	return $str;
}

}