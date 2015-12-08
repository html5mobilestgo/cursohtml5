<?php
// Noticia.php

class Noticia
{

private $AId;
private $ATitulo;
private $ATexto;
private $AFecha;


// Las funciones de acceso nos sirven para recuperar los
// valores de las propiedades
function getAId()       {return $this->AId;}
function getATitulo()   {return $this->ATitulo;}
function getATexto()    {return $this->ATexto;}
function getAFecha()    {return $this->AFecha;}


function __construct($p1=0,  $p2="", $p3="", $p4= 0) {
   	$this->AId 	= $p1;
	$this->ATitulo 	= $p2;
	$this->ATexto 	= $p3;
	$this->AFecha 	= $p4;
}

function leer($numNot) {
	$this->AId = $numNot;

    // si el identificador no es mayor a cero no se accede a la
	// base de datos
	if ($this->AId > 0) {
		// Crear un objeto AuxDB
		$db = new AuxDB();
		$db->conectar();

		// sentencia SELECT para leer una noticia determinada
		$sql = "Select ATitulo, ATexto, AFecha From ";
		$sql.= "Noticia Where AId ='".$this->AId . "'" ;

		$rst = $db->ejecutarSQL($sql);

		// desconexión con el servidor de base de datos
		$db->desconectar();

		// obtener la fila de datos
		$fila = $db->siguienteFila($rst);
		$this->ATitulo = $fila['ATitulo'];
		$this->ATexto = $fila['ATexto'];
		$this->AFecha = $fila['AFecha'];
	}
}


function insertar() {
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

	// sentencia INSERT para insertar una noticia
	$sql = "Insert Into Noticia (ATitulo, ATexto, AFecha) Values ('";
	$sql.= mysql_escape_string($this->ATitulo) . "', '";
	$sql.= mysql_escape_string($this->ATexto) . "', ";
	$sql.=  "NOW() ) ";
	
	print "SQL Insert)" . $sql . "<BR>";

	// ejecución de la sentencia SQL
	$db->ejecutarSQL($sql);

	// desconexión con el servidor de base de datos
	$db->desconectar();
}


function modificar() {
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

	// sentencia UPDATE para modificar una noticia
	$sql = "Update Noticia Set ATitulo='" . mysql_escape_string($this->ATitulo) . "', ";
	$sql.= "ATexto ='". mysql_escape_string($this->ATexto) ."'  ";
	$sql.= "Where AId=' " . $this->AId . "'";

	// ejecución de la sentencia SQL
	$db->ejecutarSQL($sql);

	// desconexión con el servidor de base de datos
	$db->desconectar();
}


function eliminar($p1) {
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

        // sentencia DELETE para eliminar todos los comentarios
	$sql = "Delete From Comentario Where CAId=" . $p1 . " ";

	// ejecución de la sentencia SQL
	$db->ejecutarSQL($sql);

	// sentencia DELETE para eliminar una noticia
	$sql = "Delete From Noticia Where AId=" . $p1 . " ";

	// ejecución de la sentencia SQL
	$db->ejecutarSQL($sql);
	
	// desconexión con el servidor de base de datos
	$db->desconectar();
}


function visualizar() {
	// Fija la información de región
	setlocale(LC_TIME, "sp_SP", "SP");

 	// Se genera código HTML con la información de la noticia
	$ret = "<B>" . nl2br($this->ATitulo) . "</B><BR><BR>";
	$ret.=  nl2br($this->ATexto) . "<BR><BR>";
	$ret.=  $this->AFecha . " :: ";

  	// Se incluye un enlace para producir comentarios de la noticia
	$colCom = new colComentario($this->AId);
	
	$ret .= "<a href=\"comentario.php?id=" .$this->AId .
	 "\">comentarios (" .$colCom->cantComentarios() . ")</a>";

	// retorno de la cadena que se visualiza
	return $ret;

}
}