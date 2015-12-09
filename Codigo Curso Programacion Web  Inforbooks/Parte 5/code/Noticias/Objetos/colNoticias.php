<?php
// colNoticias.php

class ColNoticias
{
// en esta variable privada se almacenan todos los objetos
// Noticia
private $News = Array();


function __Construct() {

 // Crear un objeto AuxDB
 $db = new AuxDB();
 $db->conectar();

 // sentencia SELECT para leer todas las noticias
 $sql = "Select AId, ATitulo, ATexto, AFecha From ";
 $sql .= "Noticia Order by AFecha Desc" ;
 $rst = $db->ejecutarSQL($sql);


 while( $fila = $db->SiguienteFila($rst)) {

 // carga de elementos Noticia
 // uso del constructor parametrizado
  $this->News[] = new Noticia( $fila['AId'],
     $fila['ATitulo'], $fila['ATexto'], $fila['AFecha'] );

 }
 // al finalizar de utilizar el conjunto de resultados lo
 // liberamos
 $db->liberarRecursos( $rst );
}


function obtenerLista() {
 // producimos el código HTML con la sentencia Select
 // de encabezamiento
 print("<select name =\"IdNot\">\n");

 foreach( $this->News as $elem ) {
  print("<option value=\"".$elem->getAId()."\">".$elem->getATitulo(). "</option>\n");
 }

 // cerrar la instrucción select
 print("</select>\n");
}

function visualizarTodos() {
 $str ="";
 // recorremos toda la matriz con foreach
 foreach( $this->News as $elem ) {
  $str .=  $elem->visualizar() . "<br><br>";
 }
 // devuelve cadena
 return $str;
}
 
function visualizarLista() {
 // recorremos toda la matriz con foreach
 foreach( $this->News as $elem ) {

  $str = substr($elem->GetATitulo(), 0,20);
  print("<a href=\"index.php?AID=".$elem->GetAId()."\">(".
        $elem->GetAfecha() . ") " . $str . "</a><br/>");
 }
}

 

}