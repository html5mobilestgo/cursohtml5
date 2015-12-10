<?php
print "<B><U>Clonaci�n de objetos (ejemplo file098.php)</U></B><BR><BR>";

// Definici�n de la clase Prueba
class Prueba {
 	static $contador = 0;
	
	function __construct() {
	        print "<BR>entra a construct: " . self::$contador . "<BR>";
                self::$contador++;
	}
		  
}

 
$objPrueba = new Prueba;

$objPrueba->cliente = "cliente original";
$objPrueba->direcci�n = "direcci�n original";
print "Objeto original<BR>";

// el objeto original
print "Contador " . Prueba::$contador . "<BR>";
print $objPrueba->cliente . "<BR>"; 
print $objPrueba->direcci�n . "<BR>"; 

$CloPrueba = clone $objPrueba;
print "<BR>Objeto clonado<BR>";

// el objeto clonado
print "Contador " . Prueba::$contador . "<BR>";
print $CloPrueba->cliente . "<BR>"; 
print $CloPrueba->direcci�n . "<BR>"; 

?>  