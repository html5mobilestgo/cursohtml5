<?php
print "<BR><B><U> Selecci�n de una base de datos con MySQL (ejemplo Parte 5/code/code142.php) </B><BR> ";
// se establece la conexi�n con el servidor localhost
// usuario: root
// contrase�a: (la que sea)

// se crea una conexi�n
$con = mysqli_connect("localhost","root","0021")
	or die ("No se puede establecer la conexi�n");

// seleccionar una base de datos
$db = mysqli_select_db($con, 'Clientes');

// si la funci�n devuelve false
// es porque la base de datos no se pudo seleccionar
if (!$db) {
    die ('No se puede seleccionar Clientes : ' . mysqli_error($con));
}
echo 'OK';

?>
