<?php
// header.php

function __autoload($objeto) {
	include("Objetos/".$objeto.".php");
}
?>
<html>
<head>
<title>Aplicaci�n Noticias comentadas cap�tulo 20</title>

<?php
include("estilos.php")
?>

</head>
<body>
<div align="center">
<table cellpadding="0" cellspacing="0" width="90%">
<tr><td colspan="3" class="t�tulo"><B><U>NOTICIAS COMENTADAS</B></U></td></tr>
<tr><td colspan="3"><br/></td></tr>

<tr>
  <td class="marco" width="40%">
    <B><U>��LTIMO MOMENTO!</U></B><br/>
    <br/>
<?php
// crea un objeto colecci�n de noticias
$com = New colNoticias();

// visualiza la lista de noticias
// ordenadas por fecha descendente
print( $com->visualizarLista() );
?>

  </td>
  <td width="2%">&nbsp;</td>
  <td class="marco" width="58%">

