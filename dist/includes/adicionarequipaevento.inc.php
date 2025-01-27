<?php

require 'settings.inc.php';
include 'db.inc.php';
db_connect();

if((isset($_POST['idequipamodaladicionar']))&&(isset($_POST['ideventomodaladicionar']))){
    $idequipa = $_POST['idequipamodaladicionar'];
    $idevento = $_POST['ideventomodaladicionar'];
}else{
    header('Location: '.'../../eventos.php?success=0');
    die();
}

$query = "INSERT INTO equipasevento (id_equipa, id_evento) VALUES ('$idequipa', '$idevento')";
db_query($query);

header('Location: '.'../../eventos.php?success=1');

?>