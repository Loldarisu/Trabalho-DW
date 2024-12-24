<?php

require 'settings.inc.php';
include 'db.inc.php';
db_connect();

if(isset($_POST['selectequipa']) && isset($_POST['idatleta'])){
    $idequipa = $_POST['selectequipa'];
    $idatleta = $_POST['idatleta'];
}else{
    header('Location: '.$arrSETTINGS['url_site'].'/equipas.php?success=0');
    die();
}

$query = "SELECT * FROM membrosequipa WHERE id_atleta = '$idatleta' AND id_equipa = '$idequipa'";
$verify = db_query($query);

if($verify==null){
    $query = "INSERT INTO membrosequipa (id_atleta, id_equipa) VALUES ('$idatleta', '$idequipa')";
    db_query($query);
}else{

    header('Location: '.$arrSETTINGS['url_site'].'/equipas.php?success=0');
    die();

}



header('Location: '.$arrSETTINGS['url_site'].'/equipas.php?success=1');

?>