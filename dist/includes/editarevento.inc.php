<?php

require 'settings.inc.php';
include 'db.inc.php';
db_connect();

$nome = $_POST['nome'];
$info = $_POST['info'];
$data = $_POST['data'];

$id = $_GET['id'];

$query = "UPDATE eventos SET nome='$nome', info='$info', data='$data' WHERE id = '$id'";
db_query($query);

header('Location: ../../editarevento.php?id='.$id.'&success=1'); 


?>