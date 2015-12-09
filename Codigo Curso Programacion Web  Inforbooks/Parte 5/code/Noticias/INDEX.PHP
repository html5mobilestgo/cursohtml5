<?php
// index.php

include("header.php");

// crea un objeto noticia
$noticia = New Noticia();
$AID = 0;
if( isset( $_GET['AID'] ) ) {
    $AID = $_GET['AID'];
}

if ($AID > 0) { 
    $noticia->leer($AID);
    print($noticia->visualizar());
}

include("footer.php");
?>
