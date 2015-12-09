<?php
// Comentario.php (definición de la clase)

class Comentario
{

private $CID;
private $CAId;
Private $CUsuario;
private $CTexto;
private $CFecha;

// Las funciones de acceso nos sirven para recuperar los
// valores de las propiedades
function getCId()  		{return $this->CId;}
function getCAId()  	{return $this->CAId;}
function getCUsuario()  {return $this->CUsuario;}
function getCTexto()  	{return $this->CTexto;}
function getCFecha()  	{return $this->CFecha;}


// método  constructor
function __construct($p1=0,  $p2="", $p3="", $p4= 0) {
	$this->CId = 0;
	$this->CAId = $p1;
	$this->CUsuario = $p2;
	$this->CTexto = $p3;
	$this->CFecha = $p4;
}


function leer($numCom) {
	$this->CId = $numCom;
    // si el identificador no es mayor a cero no se accede a la
	// base de datos

	if ($this->CId > 0) {
		// Crear un objeto AuxDB
		$db = new AuxDB();
		$db->conectar();

		// sentencia SELECT para leer un comentario determinado
		$sql = "Select CAId, CUsuario, CTexto, CFecha From ";
		$sql.= "Comentario Where CId ='".$this->CId . "'" ;
		$rst = $db->ejecutarSQL($sql);

		// desconexión con el servidor de base de datos
		$db->desconectar();

		// obtener la fila de datos
		$fila = $db->siguienteFila($rst);
		$this->CAId = $fila['CAId'];
		$this->CUsuario = $fila['CUsuario'];
		$this->CTexto = $fila['CTexto'];
		$this->CFecha = $fila['CFecha'];
	}
}


function insertar() {
	// Crear un objeto AuxDB
	$db = new AuxDB();
	$db->conectar();

	// sentencia INSERT para insertar un comentario
	$sql = "Insert Into Comentario (CAId, CUsuario, CTexto, CFecha) Values (";
	$sql.=  $this->CAId . ",'" . mysql_escape_string($this->CUsuario) . "', '";
	$sql.=  mysql_escape_string($this->CTexto) . "', ";
	$sql.=  "NOW() ) ";

	// ejecución de la sentencia SQL
	$db->ejecutarSQL($sql);

	// desconexión con el servidor de base de datos
	$db->desconectar();
}


function visualizar() {
	// Fija la información de región
	setlocale(LC_TIME, "sp_SP");

 	// Se genera código HTML con la información del artículo
	$ret =  "<BR>" . nl2br($this->CTexto) . "<BR><BR>";
	$ret.= "Comentado por:  <B>" . nl2br($this->CUsuario) . "</B>  (";
	$ret.= $this->CFecha . ")<BR><BR>";
	
        return $ret;
}
}