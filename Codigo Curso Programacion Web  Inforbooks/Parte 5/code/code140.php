<?php
print "<BR><B><U> Conexi�n inicial con el servidor MySQL
	(ejemplo Parte 5/code/code140.php) <BR></B></U>";
$con = mysqli_connect("localhost","root","0021") or
  die ("no se pudo establecer la conexi�n con el servidor MySQL");
echo "�OK Conexi�n establecida!\n";
?>