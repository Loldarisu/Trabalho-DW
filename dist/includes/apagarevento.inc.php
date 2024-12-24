<?php

require 'settings.inc.php';
include 'db.inc.php';
db_connect();

if(isset($_POST['ideventoapagarmodal'])){
    $id = $_POST['ideventoapagarmodal'];
}else{
    header('Location: '.$arrSETTINGS['url_site'].'/eventos.php?success=0');
    die();
}

$query = "DELETE FROM eventos WHERE id = '$id'";
db_query($query);

$query = "DELETE FROM equipasevento WHERE id_evento = '$id'";
db_query($query);

header('Location: '.$arrSETTINGS['url_site'].'/eventos.php?success=1');
die();

?>