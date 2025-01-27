<?php

require 'settings.inc.php';
include 'db.inc.php';
db_connect();

if(isset($_POST['nomeequipa'])){
    $nome = $_POST['nomeequipa'];
}else{
    header('Location: '.'../../equipas.php?success=0');
    die();
}

$query = "SELECT * FROM equipas";
$VerifNome = db_query($query);

if($VerifNome!=null){
    foreach($VerifNome as $v){

        if($nome == $v['nome']){
            header('Location: '.'../../equipas.php?success=0');
            die();
        }

    }
}

$query = "INSERT INTO equipas (nome) VALUES ('$nome')";
db_query($query);

header('Location: '.'../../equipas.php?success=1');

?>