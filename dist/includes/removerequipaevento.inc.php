<?php

require 'settings.inc.php';
include 'db.inc.php';
db_connect();

if((isset($_POST['idequipamodal']))&&(isset($_POST['ideventomodal']))){
    $id_equipa = $_POST['idequipamodal'];
    $id_evento = $_POST['ideventomodal'];
}else{
    header('Location: '.'../../eventos.php?success=0');
    die();
}

$query = "DELETE FROM equipasevento WHERE id_equipa = '$id_equipa' AND id_evento = '$id_evento'";
db_query($query);

header('Location: '.'../../eventos.php?success=1');
die();

?>