<?php
require 'dist/includes/settings.inc.php';
include 'dist/includes/db.inc.php';
db_connect();

if(isset($_GET['id'])){

    $id = $_GET['id'];

}else{
    header('Location: index.php');
    die();
}

$query = "SELECT * FROM atletas WHERE id = '$id'";
$Atleta = db_query($query);

?>

<!DOCTYPE HTML>
<html lang="pt-pt">

    <?php

    include 'dist/includes/head.inc.php';

    ?>

<body style="overflow-y: auto;">

    <?php

    include 'dist/includes/navbar.inc.php';

    ?>

    <?php

    include 'dist/includes/toasts.inc.php';

    ?>

    <?php

    foreach($Atleta as $v){

        if($v['gen']=="M"){
            $mascselect = "selected";
            $femiselect = "";
        }else{
            $mascselect = "";
            $femiselect = "selected";
        }

        echo '<section style="padding-top:50px">

        <div class="container">
        <button class="btn btn-primary hBack" style="border:0;color:white" type="button"><i class="fa fa-caret-left"></i>&nbsp Voltar</button>
        <button class="btn btn-warning" style="border:0;color:white;" onclick="EditarPerfil();" id="editarbutton" type="button"><i class="fa fa-edit"></i>&nbsp Editar</button>
        <a class="btn btn-danger" hidden style="color:white;" id="cancelarbutton" href="atletainfo.php?id='.$id.'"><i class="fa fa-times"></i>&nbsp Cancelar</a>


            <div class="row" style="margin-top:20px">
                <div class="col-12">
                    <img src="https://eu.ui-avatars.com/api/?name='.strip_tags($v['nome']).'" style="width:200px;border-radius:50%;display:block;margin-left:auto;margin-right:auto" alt="">
                </div>

                <div class="col-12" style="margin-top:50px;margin-bottom:15px">
                    <form action="dist/includes/editaratleta.inc.php?id='.$id.'" method="POST" class="">

                        <div class="mb-3">
                            <label class="form-label text-dark" for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="'.$v['nome'].'" placeholder="Ex: João" minlength="3" maxlength="30" disabled>
                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-dark" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="'.$v['email'].'" placeholder="exemplo@exemplo.com" disabled>
                            <div class="text-dark" style="font-style: italic;font-size:12px">Nunca iremos partilhar o seu email.</div>
                        </div>


                        

                        <div class="mb-3">
                            <label class="form-label text-dark" for="peso">Peso (kg)</label>
                            <input type="number"
                                class="form-control"
                                id="peso" name="peso" min="1" max="200" step=".1" value="'.$v['peso'].'" disabled>
                            
                        </div>

                        
                        <div class="mb-3">
                            
                            <label class="form-label text-dark" for="altura">Altura (m)</label>
                            <input type="number"
                                class="form-control"
                                id="altura" name="altura" min="1" max="3" step=".01" value="'.$v['altura'].'" disabled>
                            
                            
                        </div>


                        <div class="mb-3">
                            <label class="form-label text-dark" for="potfunc">Potência
                                Funcional (W/Kg)</label>
                                
                            <input type="number"
                                class="form-control"
                                 id="potfunc" name="potfunc" min="1" max="10" step=".01" value="'.$v['potfunc'].'" disabled>
                            
                        </div>

                        <div class="mb-3">
                            
                                <label class="form-label text-dark" for="genero">Gênero</label>
                                    <select class="form-select" id="genero"
                                        name="genero" disabled>
                                        <option value="M" '.$mascselect.'>Masculino</option>
                                        <option value="F" '.$femiselect.'>Feminino</option>
                                    </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-dark" for="data">Data de
                                Nascimento</label>
                            <input type="date" class="form-control" name="data"
                                id="data" value="'.$v['nasc'].'" disabled>
                        </div>

                        <button class="btn btn-success" style="display:none;margin-left:auto;color:white" id="alterarbutton" type="submit"><i class="fa fa-check"></i>&nbsp Alterar</button>

                    </form>
                </div>

            </div>
        </div>

    </section>';
    }

    ?>

    

    <?php

    include 'dist/includes/footer.inc.php';

    ?>

</body>

<script src="dist/js/main.js"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>   

    $('.modal').on('hidden.bs.modal', function () {
        $('body').css("overflow-y","auto");
    });

    $(".hBack").on("click", function(e){
        e.preventDefault();
        window.history.back();
    });
    
</script>

<script>

    function EditarPerfil(){
        var inputs = document.getElementsByTagName("INPUT");
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].disabled = false;
            inputs[i].required = true;
        }
        var select = document.getElementById("genero");
        select.disabled = false;
        select.required = true;

        var button = document.getElementById("alterarbutton");
        button.style.display = "block";

        var button = document.getElementById("editarbutton");
        button.style.display = "none";

        var button = document.getElementById("cancelarbutton");
        button.hidden = false;
    }

</script>

</html>