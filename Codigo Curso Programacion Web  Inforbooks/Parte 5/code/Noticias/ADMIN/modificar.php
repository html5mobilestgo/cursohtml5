<?php
// modificar.php

include("header.php");

// la primera vez que se entra a esta página
// la acción está sin asignar
$oper = "";

// si ya entró anteriormente la acción puede ser
// obtener
// o
// modificar
if( isset( $_GET['oper'] ) ) {
	$oper = $_GET['oper'];
}


switch($oper) {
	case "obtener":
	// en esta acción se busca la noticia elegida en la primera llamada
	// a la pantalla modificar
		$not = new Noticia();
		$not->leer($_POST['IdNot']);

		// crea un formulario que llama a esta misma página pero con un
		// parámetro oper igual a modificar
		print("Datos de la noticia: <br/><br/>");
		print("<form action=\"modificar.php?oper=modificar\" method=\"post\">");
		print("<table>\n");
		print("<tr><td valign=\"top\">Tema de la noticia :</td><td><input type=\"text\" name=\"título\" value=\"".$not->getATitulo()."\"></td>");
		print("<td><input type=\"submit\" value=\"Validar\"></td></tr>\n");
		print("<tr><td valign=\"top\">Texto :</td><td colspan=\"2\"><textarea name=\"texto\" rows=\"20\" cols=\"50\">".$not->getATexto()."</textarea></td></tr>\n");

		print("</table>\n");

		// se crea un campo oculto con el número de noticia
		print("<input type=\"hidden\" name=\"IdNot\" value=\"".$_POST['IdNot']."\">\n");
		print("</form>");
		break;

	case "modificar":
	// validación de los campos del formulario
		if( isset( $_POST['título'] ) && !empty( $_POST['título'] ) &&
		    isset( $_POST['texto'] ) && !empty( $_POST['texto'] ) )  	{
			// detecta uso de escape
			$_POST['título'] = stripslashes( $_POST['título'] );
			$_POST['texto'] = stripslashes( $_POST['texto'] );
			
			// crea un objeto Noticia
			$not = new Noticia( $_POST['IdNot'], $_POST['título'], $_POST['texto'] );

			// modifica los datos en la tabla
			$not->modificar();

			print("Noticia modificada.");
		}
		else
			print("Error de validación en datos del formulario");

		break;


	default:
	// esta acción se emplea la primera vez que se carga la página
		print("Seleccionar el tema que se quiere modificar :<br/><br/>");
		// crea un formulario que llama a la propia página pero
		// con un parámetro oper diferente
		print("<form action=\"modificar.php?oper=obtener\" method=\"post\">");

        // crea un objeto colNoticias  
		$nots = new colNoticias();

		// genera una lista de selección con los nombres de los temas
		// de las noticias
		$nots->obtenerLista();

		print("<input type=\"submit\" value=\"Modificar\">\n");
		print("</table>\n");
		print("</form>");
}

include("footer.php");
?>

