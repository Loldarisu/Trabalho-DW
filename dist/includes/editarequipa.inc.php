<?php

require 'settings.inc.php';
include 'db.inc.php';
db_connect();

$nome = $_POST['nome'];

$id = $_GET['id'];

$query = "SELECT * FROM equipas WHERE id != '$id'";
$VerifNome = db_query($query);

if($VerifNome!=null){
    foreach($VerifNome as $v){

        if($nome == $v['nome']){
            header('Location: ../../editarequipa.php?id='.$id.'&success=0'); 
            die();
        }

    }
}

$query = "UPDATE equipas SET nome='$nome' WHERE id = '$id'";
db_query($query);

foreach($_POST as $key => $value) {

    if(strpos($key, 'atleta') === 0) {
        
        $idatleta = $value;

        $query = "DELETE FROM membrosequipa WHERE id_atleta = '$idatleta' AND id_equipa = '$id'";
        db_query($query);
        
    }
}

header('Location: ../../editarequipa.php?id='.$id.'&success=1'); 


?>