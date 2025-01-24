<?php
require 'dist/includes/settings.inc.php';
include 'dist/includes/db.inc.php';
db_connect();

if(isset($_GET['search'])){
    $search = "WHERE nome LIKE '%".$_GET['search']."%'";
}else{
    $search = "";
}
?>

<!DOCTYPE HTML>
<html lang="pt-pt">

    <?php

        include 'dist/includes/head.inc.php';

    ?>

<body class="" style="overflow-y: auto;">

    <?php

        include 'dist/includes/navbar.inc.php';

    ?>

    <?php

        include 'dist/includes/toasts.inc.php';

    ?>

    <div class="row justify-content-center mt-4">
        <div class="col-10 marginstyle offset-md-0 col-md-5" style="margin-bottom:20px;">
            <div class="">
                <div class="px-1">
                    <form action="atletas.php" method="get">
                        <div class="input-group mt-4 shadow-card rounded">
                            <input type="text" class="form-control border-0 text-secondary bg-light"
                                placeholder="Procurar..." id="search" name="search" required>
                            <span class="input-group-btn">
                                <button class="nav-link  me-1 text-dark" style="background:transparent;border:0" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>

                            <span class="input-group-btn">
                                <a class="nav-link  me-1 text-dark" style="background:transparent;border:0" href="atletas.php"
                                    role="button">
                                    <i class="fas fa-eraser"></i>
                                </a>                                
                            </span>
                        </div>
                    </form>
                </div>

                    <?php

                        $query = "SELECT * FROM atletas $search";
                        $arrAtletas = db_query($query);

                        if($arrAtletas!=null){

                            echo '<div class="px-1" style="overflow-y: auto; max-height: 80vh;padding-right:10px;margin-top:10px;padding-bottom:10px">';

                            foreach($arrAtletas as $v){

                                $idpotencias = $v['id_potfunc'];
                                $query = "SELECT cat FROM potencias WHERE id = '$idpotencias'";
                                $arrPotencia = db_query($query);

                                if(strlen($v['nome'])>15){
                                    $nome = substr($v['nome'],0,14).'...';
                                }else{
                                    $nome = $v['nome'];
                                }

                                echo '<div class="rounded shadow-card d-flex mt-3 justify-content-between" >
                                    <div class="px-2 mb-1 ms-1 w-50 overflow-hidden">
                                        <span class="fs-4 text-nowrap text-dark" id="nomeatleta'.$v['id'].'">'.strip_tags($nome).'</span>
                                        <br>
                                        <span class="fs-6 me-5 text-dark">Categoria: '.$arrPotencia[0]['cat'].'</span>
                                    </div>
                                    <span class="w-50 mt-4 mx-auto pt-2 fs-6 text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Peso (kg) | Altura (m) | Género">'.$v['peso'].' | '.$v['altura'].' | '.$v['gen'].'</span>
                                    <a href="atletainfo.php?id='.$v['id'].'" style="margin-top:20px"><i class="fas fa-info-circle text-primary"></i></a>
                                    <a href="javascript:ApagarModal('.$v['id'].')"
                                        class="w-20 fs-5 ms-3 ps-2 pe-3 text-danger text-decoration-none border border-start border-dark border-0 my-auto">Remover</a>
                                </div>';
                                
                            }   

                            echo '</div>';

                        }else{
                            echo '<div class="px-1" style="overflow-y: auto; max-height: 80vh;padding-right:10px;margin-top:10px;padding-bottom:10px;">
                            <h4 class="text-primary" style="text-align:center">Não existem resultados!</h4>
                            </div>';
                        }

                    ?>                  
                

            </div>
        </div>
        <div class="col-10 offset-md-0 col-md-5"
            style="align-items: center; text-align: center;min-height: 90vh;">
            <div class="mx-auto">
                <div class="text-primary bg-light fs-1 mx-auto">Adicionar Atleta</div>
                <div class="bg-primary mx-auto py-5 px-2 rounded">
                    <form action="dist/includes/atletas.inc.php" method="POST" class="mx-3">

                        <div class="d-flex">
                            <label class="text-light align-middle fs-5 mt-1 fw-light" for="nome">Nome</label>
                            <input type="text" class="ms-3 form-control text-dark bg-light border-0" id="nome" name="nome" placeholder="Ex: João" minlength="3" maxlength="30" required>
                            
                        </div>

                        <div class="d-flex mt-4">
                            <label class="text-light align-middle fs-5 mt-1 fw-light" for="email">Email</label>
                            <input type="email" class="ms-3 form-control text-dark bg-light border-0" id="email" name="email" placeholder="exemplo@exemplo.com" required>
                        </div>
                        

                        <div class="d-flex mt-4">

                            <div class="d-flex">
                                <label class="text-light align-text-bottom fs-5 mt-1 fw-light" for="peso">Peso</label>
                                <input type="number"
                                    class="ms-4 bg-primary text-light form-control w-75 border-light rounded-0 rounded-start"
                                    id="peso" name="peso" min="1" max="200" step=".1" required>
                                <div
                                    class="input-group-text text-primary border-light border-0 rounded-0 rounded-end w-75 fs-6 bg-light">
                                    <span class="mx-auto">Kg</span>
                                </div>
                            </div>

                            
                            <div class="d-flex" style="margin-left:5%">
                                
                                <label class="text-light align-text-bottom fs-5 mt-1 fw-light" for="altura">Altura</label>
                                <input type="number"
                                    class="ms-4 bg-primary text-light form-control w-75 border-light rounded-0 rounded-start"
                                    id="altura" name="altura" min="1" max="3" step=".01" required>
                                <div
                                    class="input-group-text text-primary border-light border-0 rounded-0 rounded-end w-75 fs-6 bg-light">
                                    <span class="mx-auto">m</span>
                                </div>
                                
                            </div>
                            

                        </div>

                        <div class="d-flex mt-4">
                            <label class="text-light align-middle fs-5 mt-1 fw-light" for="potfunc">Potência
                                Funcional</label>
                            <input type="number"
                                class="ms-5 bg-primary text-light form-control border-light rounded-0 rounded-start"
                                style="width:14%" id="potfunc" name="potfunc" min="1" max="10" step=".01" required>
                            <div class="input-group-text text-primary border-0 rounded-0 rounded-end bg-light">
                                <div class="mx-auto">W/Kg</div>
                            </div>
                        </div>

                        <div class="d-flex mt-4">
                            
                                <label class="text-light align-middle fs-5 mt-1 fw-light" for="genero">Gênero</label>
                                    <select class="btn btn-light ms-3 w-60 ps-2 bg-light text-dark border-0" id="genero"
                                        name="genero" required>
                                        <option value="M" selected>Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                        </div>

                        <div class="form-group d-flex mt-4">
                            <label class="text-light me-4 text-nowrap fs-5 mt-1 fw-light" for="data">Data de
                                Nascimento</label>
                            <input type="date" class="form-control w-100 me-4 bg-light text-dark border-0" name="data"
                                id="data" required>
                        </div>

                        

                        <div class="w-100 d-flex justify-content-center"><button type="submit"
                                class="px-4 text-primary btn btn-lg btn-light fs-4 mt-4 bg-light border-0">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="ApagarModal" tabindex="-1" aria-labelledby="labelapagarmodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelapagarmodal">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja mesmo remover o atleta: <span id="modalnomeatleta" style="font-weight:bold"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" style="color:white" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="dist/includes/deleteatleta.inc.php" method="post">
                        <input type="hidden" name="removeratletaid" id="removeratletaid" value="">
                        <button type="submit" style="color:white" class="btn btn-danger">Remover</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php

    include 'dist/includes/footer.inc.php';

    ?>

</body>

<script type="text/javascript" src="dist/js/main.js"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>   

    $('.modal').on('hidden.bs.modal', function () {
        $('body').css("overflow-y","auto");
    });
    
</script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</html>