<?php
require 'dist/includes/settings.inc.php';
include $arrSETTINGS['dir_site'].'/dist/includes/db.inc.php';
db_connect();

if(isset($_GET['id'])){

    $id = $_GET['id'];

}else{
    header('Location: eventos.php');
    die();
}

$query = "SELECT * FROM eventos WHERE id = '$id'";
$Evento = db_query($query);

?>

<!DOCTYPE HTML>
<html lang="pt-pt">

    <?php

    include $arrSETTINGS['dir_site'].'/dist/includes/head.inc.php';

    ?>

<body style="overflow-y: auto;">

    <?php

    include $arrSETTINGS['dir_site'].'/dist/includes/navbar.inc.php';

    ?>

    <?php

    include $arrSETTINGS['dir_site'].'/dist/includes/toasts.inc.php';

    ?>

    <?php

    foreach($Evento as $v){

        $data = str_replace(' ', 'T', $v['data']);;

        echo '<section style="padding-top:50px">

        <div class="container">
        <button class="btn btn-primary hBack" style="border:0;color:white" type="button"><i class="fa fa-caret-left"></i>&nbsp Voltar</button>

            <div class="row" style="margin-top:20px">
                <div class="col-12">
                    <img src="https://eu.ui-avatars.com/api/?name='.strip_tags($v['nome']).'" style="width:200px;border-radius:50%;display:block;margin-left:auto;margin-right:auto" alt="">
                </div>

                <div class="col-12" style="margin-top:50px;margin-bottom:15px">
                    <form action="dist/includes/editarevento.inc.php?id='.$id.'" method="POST" class="">

                        <div class="mb-3">
                            <label class="form-label text-dark" for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="'.$v['nome'].'" placeholder="ex: Volta a Portugal" minlength="3" maxlength="30" required>
                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-dark" for="info">Informações</label>
                            <textarea rows="2" class="form-control" id="info" name="info" value="" placeholder="ex: Localização" minlength="5" maxlength="200" required>'.$v['info'].'</textarea>
                            
                        </div>


                        

                        

                        <div class="mb-3">
                            <label class="form-label text-dark" for="data">Dia e Hora</label>
                            <input type="datetime-local" step="1" class="form-control" name="data"
                                id="data" value="'.$data.'" required>
                        </div>

                        <button class="btn btn-success" style="float:right;color:white" id="alterarbutton" type="submit"><i class="fa fa-check"></i>&nbsp Alterar</button>

                    </form>
                </div>

            </div>
        </div>

    </section>';
    }

    ?>

    

    <?php

    include $arrSETTINGS['dir_site'].'/dist/includes/footer.inc.php';

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

</html>