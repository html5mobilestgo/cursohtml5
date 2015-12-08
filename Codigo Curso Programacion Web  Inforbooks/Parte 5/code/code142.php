<?php
print "<BR><B><U> Selección de una base de datos con MySQL (ejemplo Parte 5/code/code142.php) </B><BR> ";
// se establece la conexión con el servidor localhost
// usuario: root
// contraseña: (la que sea)

// se crea una conexión
$con = mysqli_connect("localhost","root","0021")
	or die ("No se puede establecer la conexión");

// seleccionar una base de datos
$db = mysqli_select_db($con, 'Clientes');

// si la función devuelve false
// es porque la base de datos no se pudo seleccionar
if (!$db) {
    die ('No se puede seleccionar Clientes : ' . mysqli_error($con));
}
echo 'OK';

?>
