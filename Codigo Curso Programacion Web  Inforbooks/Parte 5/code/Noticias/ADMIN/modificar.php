<?php
// modificar.php

include("header.php");

// la primera vez que se entra a esta p�gina
// la acci�n est� sin asignar
$oper = "";

// si ya entr� anteriormente la acci�n puede ser
// obtener
// o
// modificar
if( isset( $_GET['oper'] ) ) {
	$oper = $_GET['oper'];
}


switch($oper) {
	case "obtener":
	// en esta acci�n se busca la noticia elegida en la primera llamada
	// a la pantalla modificar
		$not = new Noticia();
		$not->leer($_POST['IdNot']);

		// crea un formulario que llama a esta misma p�gina pero con un
		// par�metro oper igual a modificar
		print("Datos de la noticia: <br/><br/>");
		print("<form action=\"modificar.php?oper=modificar\" method=\"post\">");
		print("<table>\n");
		print("<tr><td valign=\"top\">Tema de la noticia :</td><td><input type=\"text\" name=\"t�tulo\" value=\"".$not->getATitulo()."\"></td>");
		print("<td><input type=\"submit\" value=\"Validar\"></td></tr>\n");
		print("<tr><td valign=\"top\">Texto :</td><td colspan=\"2\"><textarea name=\"texto\" rows=\"20\" cols=\"50\">".$not->getATexto()."</textarea></td></tr>\n");

		print("</table>\n");

		// se crea un campo oculto con el n�mero de noticia
		print("<input type=\"hidden\" name=\"IdNot\" value=\"".$_POST['IdNot']."\">\n");
		print("</form>");
		break;

	case "modificar":
	// validaci�n de los campos del formulario
		if( isset( $_POST['t�tulo'] ) && !empty( $_POST['t�tulo'] ) &&
		    isset( $_POST['texto'] ) && !empty( $_POST['texto'] ) )  	{
			// detecta uso de escape
			$_POST['t�tulo'] = stripslashes( $_POST['t�tulo'] );
			$_POST['texto'] = stripslashes( $_POST['texto'] );
			
			// crea un objeto Noticia
			$not = new Noticia( $_POST['IdNot'], $_POST['t�tulo'], $_POST['texto'] );

			// modifica los datos en la tabla
			$not->modificar();

			print("Noticia modificada.");
		}
		else
			print("Error de validaci�n en datos del formulario");

		break;


	default:
	// esta acci�n se emplea la primera vez que se carga la p�gina
		print("Seleccionar el tema que se quiere modificar :<br/><br/>");
		// crea un formulario que llama a la propia p�gina pero
		// con un par�metro oper diferente
		print("<form action=\"modificar.php?oper=obtener\" method=\"post\">");

        // crea un objeto colNoticias  
		$nots = new colNoticias();

		// genera una lista de selecci�n con los nombres de los temas
		// de las noticias
		$nots->obtenerLista();

		print("<input type=\"submit\" value=\"Modificar\">\n");
		print("</table>\n");
		print("</form>");
}

include("footer.php");
?>

