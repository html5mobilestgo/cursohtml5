<?php
// agregar.php

include("header.php");

$oper = "";
if( isset( $_GET['oper'] ) ) {
	$oper = $_GET['oper'];
}

// esta página se llama de dos maneras:
// primero con oper en blanco
// segundo con oper=agregar
switch($oper) {
	case "agregar":
		if( isset( $_POST['título'] ) && !empty( $_POST['título'] ) &&
		    isset( $_POST['texto'] ) && !empty( $_POST['texto'] ) ) {
			// detecta uso de escape
			$_POST['título'] = stripslashes( $_POST['título'] );
			$_POST['texto'] = stripslashes( $_POST['texto'] );
			

			// crea un objeto Noticia
			$not = new Noticia( 0, $_POST['título'], $_POST['texto'] );

			// lo inserta en la tabla
			$not->insertar();

			print("Noticia añadida a la base de datos.");
		}
		else
			print("Faltan datos en el formulario de entrada");

		break;


	default:
		// la primera vez que se llama a esta página oper estará
		// en blanco
		// se crea un formulario con el parámetro oper = agregar
		// y que llama a esta misma página
		print("Formulario de entrada de noticias : <br/><br/>");
		print("<form action=\"agregar.php?oper=agregar\" method=\"post\">");
		print("<table>\n");

		print("<tr><td valign=\"top\">Tema de la noticia:</td><td><input type=\"text\" name=\"título\"></td>");
		print("<td><input type=\"submit\" value=\"Registrar\"></td></tr>\n");
		print("<tr><td valign=\"top\">Texto :</td><td colspan=\"2\"><textarea name=\"texto\" rows=\"20\" cols=\"50\"></textarea></td></tr>\n");

		print("</table>\n");
		print("</form>");
}

include("footer.php");
?>
