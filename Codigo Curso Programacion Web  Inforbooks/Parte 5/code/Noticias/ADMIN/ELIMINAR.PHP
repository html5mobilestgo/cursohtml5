<?php
// eliminar.php

include("header.php");

$oper = "";
if( isset( $_GET['oper'] ) ) {
	$oper = $_GET['oper'];
}


switch($oper) {
	case "eliminar":
		// en la segunda llamada a la p�gina el par�metro oper
		// es eliminar y el valor de $_POST['IdNot'] es el identificador
		// de la noticia que se quiere eliminar
		// crea un objeto Noticia
		$not = new Noticia( $_POST['IdNot']);
		$not->eliminar($_POST['IdNot']);
		
		print("Se elimin� la noticia");

		break;


	default:
		print("Seleccionar un tema que se eliminar� de la tabla de noticias<br/><br/>");
		// crea un formulario que llama a esta misma p�gina, pero
		// con oper = eliminar
		print("<form action=\"eliminar.php?oper=eliminar\" method=\"post\">");

		// crea un objeto colNoticias
		// con la colecci�n de todos las noticias
		$nots = new colNoticias();

		// crea una lista de selecci�n de temas de las noticias
		$nots->obtenerLista();

		print("<input type=\"submit\" value=\"Eliminar\">\n");
		print("</table>\n");
		print("</form>");
}

include("footer.php");
?>
