<?php
// header.php (carpeta Admin)

function __autoload($objeto) {
	include("../Objetos/".$objeto.".php");
}
?>
<html>
<head>
<title>Aplicación de ejemplo Noticias comentadas capítulo 20 (administración)</title>

<?php
include("../estilos.php")
?>

</head>
<body>
<div align="center">
<table cellpadding="0" cellspacing="0" width="90%">
<tr><td colspan="3" class="título"><B><U>Administración del sitio de Noticias</U></B></td></tr>
<tr><td colspan="3"><br/></td></tr>

<tr>
  <td class="marco" width="18%">
    :: Opciones<br/>
    <br/>
    - <a href="agregar.php">Añadir noticia</a><br/>
    - <a href="modificar.php">Modificar noticia</a><br/>
    - <a href="eliminar.php">Eliminar noticia</a><br/>
    - <a href="../index.php">Ir al sitio</a><br/>
  </td>
  <td width="2%">&nbsp;</td>
  <td class="marco" width="80%">