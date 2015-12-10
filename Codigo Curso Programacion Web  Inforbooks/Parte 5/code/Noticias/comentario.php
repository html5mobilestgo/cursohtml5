<?php
// comentario.php

include("header.php");

$oper = "";
if( isset( $_GET['oper'] ) ) {
	$oper = $_GET['oper'];
}


switch( $oper ) {
	case "comentario":
	    // campos texto y usuario: deben estar asignados y no vacíos
		if( isset( $_POST['texto'] ) && !empty( $_POST['texto'] ) &&
		    isset( $_POST['usuario'] ) && !empty( $_POST['usuario'] ) ) {
		    // recuperamos el identificador de la noticia
			$idNot = $_POST['id'];

			// se eliminan los escapes
			$_POST['texto'] = stripslashes( $_POST['texto'] );
			$_POST['usuario'] = stripslashes( $_POST['usuario'] );
	
			$com = new Comentario( $idNot, $_POST['usuario'], $_POST['texto'] );

			$com->insertar();

			print("Se añadió su comentario.<br/>en 3 segundos se recarga esta misma página.");
			print("<meta HTTP-EQUIV=\"refresh\" CONTENT=3;URL=\"comentario.php?id=$idNot\">");

		}
		else
			print("Hay campos faltantes en el formulario del comentario.");

		break;

	default:
	    // si no hay oper = comentario pero hay identificador de noticia
		if( isset( $_GET['id'] ) ) {
			$idNot = $_GET['id'];
			// creamos un objeto Noticia
			// y leemos la noticia
			$not = new Noticia();
			$not->leer($idNot);

			// se muestra la noticia como encabezamiento
			print   $not->visualizar() ;

			// y después todos los comentarios registrados
			$com = new colComentario($idNot);

			print "<br><br><b><u>Comentarios:</u></b><br>";
			print( $com->visualizarTodos() );

			print("<br>Para añadir su comentario utilice este formulario y pulse <b>Registrar</b><br/><br/>");

			// se crea un formulario con el parámetro oper igual a comentario
			print("<form action=\"comentario.php?oper=comentario\" method=\"post\">");
			print("<table>");
			print("<tr><td valign=\"top\">Usuario :</td><td><input type=\"text\" name=\"usuario\" class=\"datos\"></td>");
			print("<td><input type=\"submit\" value=\"Registrar\"></td></tr>");
			print("<tr><td valign=\"top\">Comentario del artículo :</td><td colspan =\"2\"><textarea name=\"texto\" rows=\"10\" cols=\"65\" class=\"datos\"></textarea></td></tr>");
			print("</table>");

			// utilizamos un campo oculto para pasar el valor del identificador
			print("<input type=\"hidden\" name=\"id\" value=\"$idNot\">\n");

			print("</form>");
		}

}


include("footer.php");
?>
