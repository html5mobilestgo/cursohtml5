<?php
print "<BR><B><U> Insertar datos 
(ejemplo Parte 5/code/code144.php) </B><BR> ";
// se establece la conexi�n con el servidor localhost
// usuario: root
// contrase�a: (la que sea)
// se crea una conexi�n  
$con = mysqli_connect("localhost","root","0021")  or
	die ("No se puede establecer la conexi�n");
// seleccionar una base de datos
$db = mysqli_select_db($con, 'Clientes');
// sentencia INSERT para insertar un cliente
$sql = "Insert Into Cliente (AApellidos, ANombre, ADomicilio, ATelefono, AEmail, AClave) Values ('";
$sql .= mysql_escape_string("Fuentes") . "', '";
$sql.= mysql_escape_string('Juan') . "', '";
$sql.= mysql_escape_string('C/Diagonal 222') . "', '";
$sql.= mysql_escape_string('934556777') . "', '";
$sql.= mysql_escape_string('juan99@hotmail.es') . "', '";
$sql.= mysql_escape_string('100.02') . "');";
// Inserci�n
$result = mysqli_query($con, $sql) or 
    die ("Error de aplicaci�n: Acceso a base de datos inv�lido");        
?>