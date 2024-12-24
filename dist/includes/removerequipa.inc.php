<?php

require 'settings.inc.php';
include 'db.inc.php';
db_connect();

if(isset($_POST['removerequipaid'])){
    $id = $_POST['removerequipaid'];
}else{
    header('Location: '.$arrSETTINGS['url_site'].'/equipas.php?success=0');
    die();
}

$query = "DELETE FROM equipas WHERE id = '$id'";
db_query($query);

$query = "DELETE FROM membrosequipa WHERE id_equipa = '$id'";
db_query($query);

$query = "DELETE FROM equipasevento WHERE id_equipa = '$id'";
db_query($query);

header('Location: '.$arrSETTINGS['url_site'].'/equipas.php?success=1');
die();

?>