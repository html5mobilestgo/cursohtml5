<?php
print "<BR><B><U> Creación de una base de datos con MySQL
	(ejemplo Parte 5/code/code141.php) </B><BR> ";
// se establece la conexión con el servidor localhost
// usuario: root
// contraseña: (la que sea)
// se crea una conexión
$con = mysqli_connect("localhost","root","0021")
	or die ("No se puede establecer la conexión");
// se crea la base de datos Clientes
// mysql_create_db es una función eliminada en PHP 6
// en su lugar se debe usar mysqli_query() con
// la sentencia de SQL puro
$sql = 'CREATE DATABASE Clientes';
if (mysqli_query($con, $sql)) {
    echo "Se creó la base de datos Clientes\n";
} else {
   echo 'Error al crear la base de datos Clientes: ' .
		mysqli_error($con) . "\n";}
?>