<?php

require 'settings.inc.php';
include 'db.inc.php';
db_connect();

if(isset($_POST['removeratletaid'])){
    $id = $_POST['removeratletaid'];
}else{
    header('Location: '.$arrSETTINGS['url_site'].'/atletas.php?success=0');
    die();
}

$query = "DELETE FROM atletas WHERE id = '$id'";
db_query($query);

$query = "DELETE FROM membrosequipa WHERE id_atleta = '$id'";
db_query($query);

header('Location: '.$arrSETTINGS['url_site'].'/atletas.php?success=1');
die();

?>