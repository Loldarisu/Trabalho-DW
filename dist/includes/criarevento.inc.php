<?php

require 'settings.inc.php';
include 'db.inc.php';
db_connect();

if((isset($_POST['nomeevento']))&&(isset($_POST['infoevento']))&&(isset($_POST['data']))){
    $nome = $_POST['nomeevento'];
    $info = $_POST['infoevento'];
    $data = $_POST['data'];
}else{
    header('Location: '.'/daraopedal/eventos.php?success=0');
    die();
}

$query = "INSERT INTO eventos (nome, info, data) VALUES ('$nome', '$info', '$data')";
db_query($query);

header('Location: '.'/daraopedal/eventos.php?success=1');

?>