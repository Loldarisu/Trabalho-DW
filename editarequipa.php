<?php
require 'dist/includes/settings.inc.php';
include 'dist/includes/db.inc.php';
db_connect();

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('Location: equipas.php');
    die();
}

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

        $query = "SELECT * FROM equipas WHERE id = '$id'";
        $Equipa = db_query($query);

        foreach($Equipa as $v){

            echo '<section style="padding-top:50px">

            <div class="container">

                <h4 class="text-dark" style="text-align:center">Editar Equipa</h4>

                <div class="row" style="margin-top:40px">

                    <form action="dist/includes/editarequipa.inc.php?id='.$v['id'].'" method="post">
                        

                        <div class="mb-3">
                            <label for="nome" class="form-label text-dark">Nome da Equipa</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="'.$v['nome'].'" style="background:white" placeholder="ex: Pernetas" minlength="3" maxlength="30" required>
                        </div>';

                        $query = "SELECT * FROM membrosequipa WHERE id_equipa = '$id'";
                        $arrMembrosEquipa = db_query($query);

                        if($arrMembrosEquipa!=null){

                            echo '<div class="mb-3" style="margin-top:20px">
                            <h6 class="text-dark">Remover Atletas (selecionar)</h6>
                            
                            <div style="max-height:14vh;overflow-y:auto;padding:10px">';
                        
                            foreach($arrMembrosEquipa as $x){

                                $idatleta = $x['id_atleta'];
                                $query = "SELECT * FROM atletas WHERE id = '$idatleta'";
                                $Atleta = db_query($query);

                                if(strlen($Atleta[0]['nome'])>15){
                                    $nome = substr($Atleta[0]['nome'],0,15).'...';
                                }else{
                                    $nome = $Atleta[0]['nome'];
                                }

                                echo '<div>
                                    <input type="checkbox" class="form-check-input" id="atleta'.$Atleta[0]['id'].'" name="atleta'.$Atleta[0]['id'].'" value="'.$Atleta[0]['id'].'" style="margin-right:10px">
                                    <span class="text-dark">'.strip_tags($nome).'</span>
                                </div>';

                            }

                            echo ' </div>
                            </div> ';
                        }                                                         
                            
                        echo '<div style="float:right">
                            <a style="color:white" href="equipas.php" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp Cancelar</a>
                            <button type="submit" style="color:white" class="btn btn-success"><i class="fa fa-check"></i>&nbsp Alterar</button>
                        </div>
                        
                    </form>

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
    
</script>

</html>