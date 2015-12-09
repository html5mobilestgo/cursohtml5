<?php
include("header.php");

if( isset( $_GET['oper'] ) ) {
	$oper = $_GET['oper'];
}
else
	$oper = "";

switch($oper) {
	case "a�adir":
		if( isset( $_POST['t�tulo'] ) && !empty( $_POST['t�tulo'] ) &&
		    isset( $_POST['texto'] ) && !empty( $_POST['texto'] ) )  {
			// detecta uso de escape
			print  "Title:"  . $_POST['t�tulo'] . "<BR>";
			$_POST['t�tulo'] = stripslashes( $_POST['t�tulo'] );
			$_POST['texto'] = stripslashes( $_POST['texto'] );
			
			$art = new Articulo( $_POST['t�tulo'], $_POST['texto'] );

			$art->insertar();

			print("Art�culo a�adido a la base de datos!!.");
		}
		else
			print("Faltan datos en el formulario de entrada");

		break;


	default:
		print("Formulario de entrada de art�culos : <br/><br/>");
		print("<form action=\"a�adir.php?oper=a�adir\" method=\"post\">");
		print("<table>\n");
		print("<tr><td valign=\"top\">Tema del art�culo:</td><td><input type=\"text\" name=\"t�tulo\"></td></tr>\n");
		print("<tr><td valign=\"top\">Texto :</td><td><textarea name=\"texto\" rows=\"20\" cols=\"50\"></textarea></td></tr>\n");
		print("<tr><td colspan=\"2\"><input type=\"submit\" value=\"Registrar\"></td></tr>\n");
		print("</table>\n");
		print("</form>");
}

include("footer.php");
?>
