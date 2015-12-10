<?php
include("header.php");

if( isset( $_GET['oper'] ) ) {
	$oper = $_GET['oper'];
}
else
	$oper = "";

switch($oper) {
	case "añadir":
		if( isset( $_POST['título'] ) && !empty( $_POST['título'] ) &&
		    isset( $_POST['texto'] ) && !empty( $_POST['texto'] ) )  {
			// detecta uso de escape
			print  "Title:"  . $_POST['título'] . "<BR>";
			$_POST['título'] = stripslashes( $_POST['título'] );
			$_POST['texto'] = stripslashes( $_POST['texto'] );
			
			$art = new Articulo( $_POST['título'], $_POST['texto'] );

			$art->insertar();

			print("Artículo añadido a la base de datos!!.");
		}
		else
			print("Faltan datos en el formulario de entrada");

		break;


	default:
		print("Formulario de entrada de artículos : <br/><br/>");
		print("<form action=\"añadir.php?oper=añadir\" method=\"post\">");
		print("<table>\n");
		print("<tr><td valign=\"top\">Tema del artículo:</td><td><input type=\"text\" name=\"título\"></td></tr>\n");
		print("<tr><td valign=\"top\">Texto :</td><td><textarea name=\"texto\" rows=\"20\" cols=\"50\"></textarea></td></tr>\n");
		print("<tr><td colspan=\"2\"><input type=\"submit\" value=\"Registrar\"></td></tr>\n");
		print("</table>\n");
		print("</form>");
}

include("footer.php");
?>
