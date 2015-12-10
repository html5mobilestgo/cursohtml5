<?php
// header.php

function __autoload($objeto) {
	include("Objetos/".$objeto.".php");
}
?>
<html>
<head>
<title>Aplicación Noticias comentadas capítulo 20</title>

<?php
include("estilos.php")
?>

</head>
<body>
<div align="center">
<table cellpadding="0" cellspacing="0" width="90%">
<tr><td colspan="3" class="título"><B><U>NOTICIAS COMENTADAS</B></U></td></tr>
<tr><td colspan="3"><br/></td></tr>

<tr>
  <td class="marco" width="40%">
    <B><U>¡ÚLTIMO MOMENTO!</U></B><br/>
    <br/>
<?php
// crea un objeto colección de noticias
$com = New colNoticias();

// visualiza la lista de noticias
// ordenadas por fecha descendente
print( $com->visualizarLista() );
?>

  </td>
  <td width="2%">&nbsp;</td>
  <td class="marco" width="58%">

