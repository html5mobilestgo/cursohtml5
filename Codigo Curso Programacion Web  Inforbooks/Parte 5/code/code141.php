<?php
print "<BR><B><U> Creaci�n de una base de datos con MySQL
	(ejemplo Parte 5/code/code141.php) </B><BR> ";
// se establece la conexi�n con el servidor localhost
// usuario: root
// contrase�a: (la que sea)
// se crea una conexi�n
$con = mysqli_connect("localhost","root","0021")
	or die ("No se puede establecer la conexi�n");
// se crea la base de datos Clientes
// mysql_create_db es una funci�n eliminada en PHP 6
// en su lugar se debe usar mysqli_query() con
// la sentencia de SQL puro
$sql = 'CREATE DATABASE Clientes';
if (mysqli_query($con, $sql)) {
    echo "Se cre� la base de datos Clientes\n";
} else {
   echo 'Error al crear la base de datos Clientes: ' .
		mysqli_error($con) . "\n";}
?>