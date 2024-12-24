<?php

require 'settings.inc.php';
include 'db.inc.php';
db_connect();

$nome = $_POST['nome'];
$email = $_POST['email'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$potfunc = $_POST['potfunc'];
$genero = $_POST['genero'];
$data = $_POST['data'];

$id = $_GET['id'];

$query = "SELECT * FROM atletas WHERE id != '$id'";
$VerifEmails = db_query($query);

if($VerifEmails!=null){
    foreach($VerifEmails as $v){

        if($email==$v['email']){
            header('Location: ../../atletainfo.php?id='.$id.'&success=0');
            die();
        }

    }
}

switch ($genero){

    case "M":

        if($potfunc <= 2.49){

            $id_potfunc = 7;
        
        }elseif($potfunc <= 3.19){

            $id_potfunc = 5;
        
        }elseif($potfunc <= 3.99){

            $id_potfunc = 3;
            
        }elseif($potfunc >= 4){

            $id_potfunc = 1;
            
        }

    break;

    case "F":

         if($potfunc <= 2.49){

            $id_potfunc = 8;
        
        }elseif($potfunc <= 3.19){

            $id_potfunc = 6;
        
        }elseif($potfunc <= 3.69){

            $id_potfunc = 4;
            
        }elseif($potfunc >= 3.70){

            $id_potfunc = 2;
            
        }

    break;
}


$query = "UPDATE atletas SET nome='$nome', email='$email', peso='$peso', altura='$altura', potfunc='$potfunc', id_potfunc='$id_potfunc', gen='$genero', nasc='$data' WHERE id = '$id'";
db_query($query);

header('Location: ../../atletainfo.php?id='.$id.'&success=1');

?>