<?php
require 'dist/includes/settings.inc.php';
include 'dist/includes/db.inc.php';
db_connect();

if(isset($_GET['search'])){

    $searchtext = $_GET['search'];

    $search = "AND nome LIKE '%".$_GET['search']."%'";

}elseif(isset($_GET['searchfilter'])){

    $searchtext = $_GET['searchfilter'];

    $search = "AND nome LIKE '%".$_GET['searchfilter']."%'";

}else{
    $search = "";
}

if((!isset($_GET['masculino']))&&(!isset($_GET['feminino']))){

    $filter = "";
    $masc = 1;
    $femi = 1;

}elseif((isset($_GET['masculino']))&&(isset($_GET['feminino']))){

    $filter = "";
    $masc = 1;
    $femi = 1;

}elseif((isset($_GET['masculino']))){

    $filter = "AND gen = 'M'";   
    
    $masc = 1;
    $femi = 0;

}else{

    $filter = "AND gen = 'F'"; 

    $masc = 0;
    $femi = 1;

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

    <div class="row mt-4">
        <div class="offset-1 col-10 offset-md-0 col-md-6">
            <div class="px-5">
                <div class="px-1">
                    <form action="equipas.php" method="get">
                        <div class="input-group mt-4 shadow-card rounded">
                            <input type="text" class="form-control border-0 text-secondary bg-light"
                                placeholder="Procurar..." id="search" name="search" required>
                            <span class="input-group-btn">
                                <button class="nav-link  me-1 text-dark" style="background:transparent;border:0" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                
                            </span>
                        </div>
                    </form>
                </div>

                <!-- Filtros -->
                <div class="mt-2" style="border-bottom:2px solid #8FC0A9;padding-bottom:15px">
                        <h6 class="text-primary mt-4">Filtros</h6>
                            <form action="equipas.php" method="get">
                                <?php if((isset($_GET['search']))||(isset($_GET['searchfilter']))){echo '<input type="hidden" name="searchfilter" id="searchfilter" value="'.$searchtext.'">';}?>
                                <div class="form-check form-check-inline ms-3">
                                    <input class="form-check-input" type="checkbox" id="masculino" name="masculino" <?php if($masc){echo 'checked';}?> />
                                    <label class="form-check-label text-primary" style="font-weight:bold" for="masculino">M</label>
                                </div>
                                <div class="form-check form-check-inline ms-3">
                                    <input class="form-check-input" type="checkbox" id="feminino" name="feminino" <?php if($femi){echo 'checked';}?> />
                                    <label class="form-check-label text-primary" style="font-weight:bold" for="feminino">F</label>
                                </div>
                                <button class="btn btn-primary ms-3" type="submit" style="margin-right:15px;color:white">Filtrar</button>
                                <a class="btn btn-primary ms-3" href="equipas.php" style="margin-right:15px;color:white">Limpar</a>
                            </form>
                    </div>

                <div class="" style="overflow-y:auto;max-height: 80vh;padding-right:10px;margin-top:10px">                    

                    <!-- Categoria A -->
                    <div class="mt-2">
                        <div class="accordion-button border border-0 border-bottom border-primary p-0 bg-light collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#CategoriaA"
                             aria-expanded="false" aria-controls="CategoriaA">
                            <div class="fs-4 ms-3 py-1 bg-light text-primary">Categoria A</div>
                        </div>
                        <div id="CategoriaA" class="accordion-collapse collapse" aria-labelledby="CategoriaA"
                             data-bs-parent="#CategoriaA">
                            <div class="accordion-body">

                                <div class="accordion" id="AccordionCatA">

                                    <?php

                                        $query = "SELECT * FROM atletas WHERE (id_potfunc = 1 OR id_potfunc = 2) $search $filter";
                                        $arrCatA = db_query($query);
                                        
                                        if($arrCatA!=null){

                                            foreach($arrCatA as $v){

                                                if(strlen($v['nome'])>15){
                                                    $nome = substr($v['nome'],0,15).'...';
                                                }else{
                                                    $nome = $v['nome'];
                                                }
    
                                                echo '<div class="shadow-card rounded mb-2">
                                                    <div class="d-flex justify-content-between pe-2 ps-3 py-1 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#atleta'.$v['id'].'" aria-expanded="true" aria-controls="atleta'.$v['id'].'">
                                                        <span class="fs-4">'.strip_tags($nome).'</span>
                                                        <span class="fs-6 my-auto">Potência Funcional: '.$v['potfunc'].' W/Kg</span>
                                                    </div>
                                                    <div id="atleta'.$v['id'].'" class="accordion-collapse collapse" aria-labelledby="atleta'.$v['id'].'" data-bs-parent="#AccordionCatA">
                                                        <div class="accordion-body justify-content-evenly d-flex">
                                                            <button class="border-0 bg-light text-dark" onclick="AdicionarAtletaModal('.$v['id'].')" data-bs-toggle="modal" data-bs-target="#AdicionarEquipaModal"><i class="me-1 fas fa-user-plus text-dark"></i> Adicionar à equipa</button>
                                                            <a href="atletainfo.php?id='.$v['id'].'" class="border-0 text-decoration-none text-dark"><i class="me-1 far fa-eye text-dark"></i>Ver atleta</a>
                                                        </div>
                                                    </div>
                                                </div>';
                                            }

                                        }else{
                                            echo '<h6 class="text-primary" style="text-align:center">Não existem atletas!</h6>';
                                        }
                                        

                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Categoria B -->
                    <div class="">
                        <div class="accordion-button border border-0 border-bottom border-primary p-0 bg-light collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#CategoriaB"
                             aria-expanded="false" aria-controls="CategoriaB">
                            <div class="fs-4 ms-3 py-1 bg-light text-primary">Categoria B</div>
                        </div>
                        <div id="CategoriaB" class="accordion-collapse collapse" aria-labelledby="CategoriaB"
                             data-bs-parent="#CategoriaB">
                            <div class="accordion-body">

                                <div class="accordion" id="AccordionCatB">

                                    <?php

                                        $query = "SELECT * FROM atletas WHERE (id_potfunc = 3 OR id_potfunc = 4) $search $filter";
                                        $arrCatB = db_query($query);

                                        if($arrCatB!=null){
                                            foreach($arrCatB as $v){

                                                if(strlen($v['nome'])>15){
                                                    $nome = substr($v['nome'],0,15).'...';
                                                }else{
                                                    $nome = $v['nome'];
                                                }

                                                echo '<div class="shadow-card rounded mb-2">
                                                    <div class="d-flex justify-content-between pe-2 ps-3 py-1 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#atleta'.$v['id'].'" aria-expanded="true" aria-controls="atleta'.$v['id'].'">
                                                        <span class="fs-4">'.strip_tags($nome).'</span>
                                                        <span class="fs-6 my-auto">Potência Funcional: '.$v['potfunc'].' W/Kg</span>
                                                    </div>
                                                    <div id="atleta'.$v['id'].'" class="accordion-collapse collapse" aria-labelledby="atleta'.$v['id'].'" data-bs-parent="#AccordionCatB">
                                                        <div class="accordion-body justify-content-evenly d-flex">
                                                        <button class="border-0 bg-light text-dark" onclick="AdicionarAtletaModal('.$v['id'].')" data-bs-toggle="modal" data-bs-target="#AdicionarEquipaModal"><i class="me-1 fas fa-user-plus text-dark"></i> Adicionar à equipa</button>                                                            <a href="atletainfo.php?id='.$v['id'].'" class="border-0 text-decoration-none text-dark"><i class="me-1 far fa-eye text-dark"></i>Ver atleta</a>
                                                        </div>
                                                    </div>
                                                </div>';

                                            }
                                        }else{
                                            echo '<h6 class="text-primary" style="text-align:center">Não existem atletas!</h6>';
                                        }
                                        

                                    ?>
                                    
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Categoria C -->
                    <div class="">
                        <div class="accordion-button border border-0 border-bottom border-primary p-0 bg-light collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#CategoriaC"
                             aria-expanded="false" aria-controls="CategoriaC">
                            <div class="fs-4 ms-3 py-1 bg-light text-primary">Categoria C</div>
                        </div>
                        <div id="CategoriaC" class="accordion-collapse collapse" aria-labelledby="CategoriaC"
                             data-bs-parent="#CategoriaC">
                            <div class="accordion-body">

                                <div class="accordion" id="AccordionCatC">

                                    <?php

                                        $query = "SELECT * FROM atletas WHERE (id_potfunc = 5 OR id_potfunc = 6) $search $filter";
                                        $arrCatC = db_query($query);

                                        if($arrCatC!=null){
                                            foreach($arrCatC as $v){

                                                if(strlen($v['nome'])>15){
                                                    $nome = substr($v['nome'],0,15).'...';
                                                }else{
                                                    $nome = $v['nome'];
                                                }

                                                echo '<div class="shadow-card rounded mb-2">
                                                    <div class="d-flex justify-content-between pe-2 ps-3 py-1 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#atleta'.$v['id'].'" aria-expanded="true" aria-controls="atleta'.$v['id'].'">
                                                        <span class="fs-4">'.strip_tags($nome).'</span>
                                                        <span class="fs-6 my-auto">Potência Funcional: '.$v['potfunc'].' W/Kg</span>
                                                    </div>
                                                    <div id="atleta'.$v['id'].'" class="accordion-collapse collapse" aria-labelledby="atleta'.$v['id'].'" data-bs-parent="#AccordionCatC">
                                                        <div class="accordion-body justify-content-evenly d-flex">
                                                        <button class="border-0 bg-light text-dark" onclick="AdicionarAtletaModal('.$v['id'].')" data-bs-toggle="modal" data-bs-target="#AdicionarEquipaModal"><i class="me-1 fas fa-user-plus text-dark"></i> Adicionar à equipa</button>                                                            <a href="atletainfo.php?id='.$v['id'].'" class="border-0 text-decoration-none text-dark"><i class="me-1 far fa-eye text-dark"></i>Ver atleta</a>
                                                        </div>
                                                    </div>
                                                </div>';

                                            }
                                        }else{
                                            echo '<h6 class="text-primary" style="text-align:center">Não existem atletas!</h6>';
                                        }
                                    ?>
                                    
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Categoria D -->
                    <div class="">
                        <div class="accordion-button border border-0 border-bottom border-primary p-0 bg-light collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#CategoriaD"
                             aria-expanded="false" aria-controls="CategoriaD">
                            <div class="fs-4 ms-3 py-1 bg-light text-primary">Categoria D</div>
                        </div>
                        <div id="CategoriaD" class="accordion-collapse collapse" aria-labelledby="CategoriaD"
                             data-bs-parent="#CategoriaD">
                            <div class="accordion-body">

                                <div class="accordion" id="AccordionCatD">

                                    <?php

                                        $query = "SELECT * FROM atletas WHERE (id_potfunc = 7 OR id_potfunc = 8) $search $filter";
                                        $arrCatD = db_query($query);

                                        if($arrCatD!=null){
                                            foreach($arrCatD as $v){

                                                if(strlen($v['nome'])>15){
                                                    $nome = substr($v['nome'],0,15).'...';
                                                }else{
                                                    $nome = $v['nome'];
                                                }

                                                echo '<div class="shadow-card rounded mb-2">
                                                    <div class="d-flex justify-content-between pe-2 ps-3 py-1 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#atleta'.$v['id'].'" aria-expanded="true" aria-controls="atleta'.$v['id'].'">
                                                        <span class="fs-4">'.strip_tags($nome).'</span>
                                                        <span class="fs-6 my-auto">Potência Funcional: '.$v['potfunc'].' W/Kg</span>
                                                    </div>
                                                    <div id="atleta'.$v['id'].'" class="accordion-collapse collapse" aria-labelledby="atleta'.$v['id'].'" data-bs-parent="#AccordionCatD">
                                                        <div class="accordion-body justify-content-evenly d-flex">
                                                        <button class="border-0 bg-light text-dark" onclick="AdicionarAtletaModal('.$v['id'].')" data-bs-toggle="modal" data-bs-target="#AdicionarEquipaModal"><i class="me-1 fas fa-user-plus text-dark"></i> Adicionar à equipa</button>                                                            <a href="atletainfo.php?id='.$v['id'].'" class="border-0 text-decoration-none text-dark"><i class="me-1 far fa-eye text-dark"></i>Ver atleta</a>
                                                        </div>
                                                    </div>
                                                </div>';

                                            }
                                        }else{
                                            echo '<h6 class="text-primary" style="text-align:center">Não existem atletas!</h6>';
                                        }
                                    ?>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                    
                                
                </div>
            </div>
        </div>

        <div class="offset-1 col-10 offset-md-0 col-md-6">
            <h3 class="text-primary mt-4">Equipas <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#CriarEquipaModal" style="border-radius:50%;margin-left:20px"><i class="fas fa-plus"></i></button></h3>
            
            <div class="accordion mt-4 pe-5" id="Equipas">

                <?php

                    $query = "SELECT * FROM equipas";
                    $arrEquipas = db_query($query);

                    if($arrEquipas!=null){

                        echo '<div class="px-1" style="overflow-y: auto; max-height: 55vh;padding-right:10px;padding-top:10px;padding-bottom:10px">';

                        foreach($arrEquipas as $v){

                            if(strlen($v['nome'])>15){
                                $nome = substr($v['nome'],0,15).'...';
                            }else{
                                $nome = $v['nome'];
                            }

                            echo '<div class="shadow-card rounded mb-2">

                                    <div class=" justify-content-between pe-2 ps-3 py-1 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#equipa'.$v['id'].'" aria-expanded="true" aria-controls="equipa'.$v['id'].'">
                                        <div class="fs-4"><span id="nomeequipa'.$v['id'].'">'.strip_tags($nome).'</span></div>

                                        <div class="fs-6 my-auto">Potência Média Funcional: <span id="mediaequipa'.$v['id'].'">--</span> W/Kg</div>
                                    </div>
                
                                    <div style="position:relative;padding-bottom:5px">
                                        <a href="editarequipa.php?id='.$v['id'].'" class="w-25 fs-5 ms-3 ps-2 text-warning text-decoration-none">Editar</a>
                                        <span class="w-25 fs-5 ms-3 ps-2 pe-3 border border-start border-dark border-0 my-auto"></span>
                                        <a href="javascript:ApagarEquipaModal('.$v['id'].');" class="w-25 fs-5 text-danger text-decoration-none">Remover</a>
                                    </div>
                
                                    <div id="equipa'.$v['id'].'" class="accordion-collapse collapse" aria-labelledby="equipa'.$v['id'].'" data-bs-parent="#Equipas">
                                        <div class="accordion-body">
                                            <div class="ms-3" style="overflow-y:auto;max-height:75px;padding-right:10px">';

                                            $query = "SELECT * FROM membrosequipa WHERE id_equipa = ".$v['id'];
                                            $arrMembrosEquipa = db_query($query);

                                            if($arrMembrosEquipa!=null){
                                                
                                                $count = count($arrMembrosEquipa);
                                                $mediaequipa = 0;

                                                foreach($arrMembrosEquipa as $x){

                                                    $query = "SELECT * FROM atletas WHERE id = ".$x['id_atleta'];
                                                    $Atleta = db_query($query);

                                                    if(strlen($Atleta[0]['nome'])>15){
                                                        $nome = substr($Atleta[0]['nome'],0,15).'...';
                                                    }else{
                                                        $nome = $Atleta[0]['nome'];
                                                    }
                                                    
                                                    $mediaequipa += $Atleta[0]['potfunc'];
                                                    
                                                    echo '<div class="border-bottom border-primary"><a class="justify-content-between d-flex text-decoration-none text-black d-flex"
                                                                href="atletainfo.php?id='.$Atleta[0]['id'].'">
                                                                <div class="text-dark">
                                                                    '.strip_tags($nome).'
                                                                </div>
                                                                <div class="text-dark">
                                                                    Potência funcional: '.$Atleta[0]['potfunc'].' W/Kg
                                                                </div>
                                                            </a>
                                                    </div>';
                                                }

                                                $mediaequipa = substr($mediaequipa/$count,0,4);

                                                echo '<script type="text/javascript">function MediaEquipa(id,media){
                                                    document.getElementById("mediaequipa"+id).innerHTML = media;
                                                }</script>';

                                                echo '<script type="text/javascript">MediaEquipa('.$v['id'].','.$mediaequipa.');</script>';
                                                
                                            }else{
                                                echo '<div class="text-dark" style="text-align:center;margin-left:0;font-weight:bold">
                                                    Não existem atletas na equipa!
                                                </div>';
                                            }
                                            
                                        echo '</div>
                
                                        </div>
                                    </div>
                            </div>';

                        }

                        echo '</div>';

                    }else{
                        echo '<h4 class="text-primary" style="text-align:center">Não existem equipas!</h4>';
                    }

                ?>
                
            </div>

        </div>
    </div>

    <!-- Modal Criar Equipa -->
    <div class="modal fade" id="CriarEquipaModal" tabindex="-1" aria-labelledby="criarequipalabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="criarequipalabel">Criar Equipa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="dist/includes/criarequipa.inc.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nomeequipa" class="form-label">Nome da Equipa</label>
                            <input type="text" class="form-control" style="background:white" placeholder="ex: Pernetas" id="nomeequipa" name="nomeequipa" minlength="3" maxlength="30" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="color:white" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" style="color:white" class="btn btn-success">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Adicionar Atleta à Equipa -->
    <div class="modal fade" id="AdicionarEquipaModal" tabindex="-1" aria-labelledby="adicionarequipalabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adicionarequipalabel">Adicionar à Equipa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="dist/includes/addequipa.inc.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                           
                            <?php

                                if($arrEquipas!=null){
                                    echo '<label for="selectequipa" class="form-label">Selecionar Equipa</label>';
                                    echo '<select class="form-select" aria-label="Selecionar Equipa" id="selectequipa" name="selectequipa" style="background-color:white;max-height:50px;overflow-y:auto">';

                                        foreach($arrEquipas as $v){
                                            echo '<option value="'.$v['id'].'">'.$v['nome'].'</option>';
                                        }
                                        
                                    echo '</select>';
                                    echo '<input type="hidden" name="idatleta" id="idatleta">';
                                }else{
                                    echo '<h6 style="text-align:center;font-weight:bold">Não existem equipas!</h6>';
                                }
                                
                            ?>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="color:white" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <?php if($arrEquipas!=null){echo '<button type="submit" style="color:white" class="btn btn-success">Adicionar</button>';}?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Remover Equipa -->
    <div class="modal fade" id="ApagarModalEquipa" tabindex="-1" aria-labelledby="labelapagarequipamodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelapagarequipamodal">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja mesmo remover a equipa: <span id="modalnomeequipa" style="font-weight:bold"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" style="color:white" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="dist/includes/removerequipa.inc.php" method="post">
                        <input type="hidden" name="removerequipaid" id="removerequipaid" value="">
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

</html>