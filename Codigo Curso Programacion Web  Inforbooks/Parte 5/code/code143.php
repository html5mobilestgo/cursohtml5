<?php
print "<BR><B><U> Creaci�n de una tabla (ejemplo Parte 5/code/code143.php) </B><BR> ";
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
    die ('No se puede seleccionar Clientes : ' . mysqli_error($con));}
// por si existiese, se
// elimina la tabla
$sql = "DROP TABLE Cliente;";
// elimina la tabla
$tb = mysqli_query($con, $sql);

// Tabla personas
$sql = "CREATE TABLE  `Cliente` (
        `AApellidos` VARCHAR( 25 ) NOT NULL ,
        `ANombre` VARCHAR( 25 ) NOT NULL ,
        `ADomicilio` VARCHAR( 25 ) NOT NULL ,
        `ATelefono` VARCHAR( 25 ) NOT NULL ,
        `AEmail` VARCHAR( 25 ) NOT NULL ,
        `AClave` REAL(5,2) NOT NULL ,
        PRIMARY KEY (  `AClave` )
        ) ENGINE = INNODB;";
// crea la tabla
$tb = mysqli_query($con, $sql);
// si la funci�n devuelve false
// es porque la tabla no se pudo crear
if (!$tb) {
    die ('No se puede crear la tabla Cliente : ' . mysqli_error($con));}
echo 'OK';
?>
