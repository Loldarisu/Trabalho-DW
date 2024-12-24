<?php
    require 'settings.inc.php';
    include 'db.inc.php';
    db_connect();

    $dia = $_GET['dia'];
    $mes = $_GET['mes'];
    $ano = $_GET['ano'];
    $date = $ano."-".$mes."-".$dia;
    $date = strtotime($date);
    $date = date('Y-m-d', $date);

    $query = "SELECT * FROM eventos WHERE DATE(data) = '$date'";
    $arrEventos = db_query($query);

    if($arrEventos!=null){

        echo '<div style="max-height:55vh;overflow-y:auto">';

        foreach($arrEventos as $v){

            
            $datetime = DateTime::createFromFormat("Y-m-d H:i:s", $v['data']);
            $hora = $datetime->format('H:i:s');
            
            if(strlen($v['nome'])>15){
                $nome = substr($v['nome'],0,14).'...';
            }else{
                $nome = $v['nome'];
            }

            echo '<div style="margin-top:20px;padding-bottom:20px;border-bottom:1px solid #8FC0A9;margin-right:40px">
                    <h5 class="text-dark ms-2" style="margin-bottom:20px"><span id="nomeevento'.$v['id'].'">'.strip_tags($nome).'</span>

                        &nbsp; | &nbsp;

                        <span style="margin-top:20px;font-size:15px" data-bs-toggle="tooltip" data-bs-placement="top" title="'.$v['info'].'"><i class="fas fa-info-circle text-primary"></i></span>&nbsp;
                        <span style="margin-top:20px;font-size:15px" data-bs-toggle="tooltip" data-bs-placement="top" title="'.$hora.'"><i class="fas fa-clock text-primary"></i></span>
                        
                        &nbsp; | &nbsp;
                        
                        <a href="editarevento.php?id='.$v['id'].'" style="margin-top:20px;font-size:15px"><i class="fas fa-edit text-warning"></i></a>&nbsp;
                        <a href="javascript:ApagarEventoModal('.$v['id'].')" style="margin-top:20px;font-size:15px"><i class="fas fa-trash text-danger"></i></a>
                    
                    </h5>';
                    
                    $idevento = $v['id'];
                    $query = "SELECT * FROM equipasevento WHERE id_evento = '$idevento'";
                    $arrEquipasEvento = db_query($query);

                    if($arrEquipasEvento!=null){

                        $filtroaddequipas = "SELECT * FROM equipas WHERE ";

                        foreach($arrEquipasEvento as $x){

                            $filtroaddequipas .= "(id != ".$x['id_equipa'].") AND ";

                            $query = "SELECT * FROM equipas WHERE id = ".$x['id_equipa']."";                                     
                            $Equipa = db_query($query);     
                            
                            if(strlen($Equipa[0]['nome'])>15){
                                $nome = substr($Equipa[0]['nome'],0,14).'...';
                            }else{
                                $nome = $Equipa[0]['nome'];
                            }

                            echo '<div class="shadow-card w-75 ms-5 mt-2 rounded d-flex justify-content-between">
                                <div class="fs-4 ms-3 py-1 w-50 text-dark"><span id="nomeequipa'.$x['id_equipa'].'">'.strip_tags($nome).'</span></div>
                                <div class=""></div>
                                <div class="d-flex w-50">';

                                    $query = "SELECT * FROM membrosequipa WHERE id_equipa = ".$x['id_equipa'];
                                    $arrMembrosEquipa = db_query($query);

                                    if($arrMembrosEquipa!=null){
                                        
                                        $count = count($arrMembrosEquipa);
                                        $mediaequipa = 0;

                                        foreach($arrMembrosEquipa as $p){

                                            $query = "SELECT * FROM atletas WHERE id = ".$p['id_atleta'];                                    
                                            $Atleta = db_query($query);
                                            
                                            $mediaequipa += $Atleta[0]['potfunc'];
                                            
                                        }

                                        $mediaequipa = substr($mediaequipa/$count,0,4);
                                        
                                    }else{
                                        $mediaequipa = "--";
                                    }

                                    
                                    
                                    
                                    echo '<div class="fs-7 my-auto overflow-hidden d-flex text-nowrap text-secondary"><span id="mediaequipa'.$x['id_equipa'].'">'.$mediaequipa.'</span>&nbsp;W/Kg</div>
                                        <a href="javascript:RemoverEquipaEv('.$x['id_equipa'].','.$v['id'].')"
                                        class=" fs-5 ms-3 ps-2 pe-3 text-danger text-decoration-none border border-start border-dark border-0 my-auto">Remover</a>
                                </div>
                            </div>';                           
                            

                        }

                        $filtroaddequipas = substr($filtroaddequipas,0,-5);

                    }else{
                        $filtroaddequipas = "SELECT * FROM equipas";
                    }                                

                    echo '<div class="mt-2 shadow-card w-75 ms-5 rounded justify-content-between">
                        <div class="" type="button" data-bs-toggle="collapse" data-bs-target="#adicionarequipas-collapse'.$v['id'].'"
                            aria-expanded="false" aria-controls="adicionarequipas-collapse'.$v['id'].'">
                            <div class="fs-4 ms-3 py-1 text-dark"> + Adicionar equipa</div>
                        </div>
                        <div id="adicionarequipas-collapse'.$v['id'].'" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">';
                            
                            $arrFiltroEquipas = db_query($filtroaddequipas);

                            if($arrFiltroEquipas!=null){

                                echo '<div class="ms-3" style="max-height: 75px;overflow-y:auto;padding-right:10px">';

                                foreach($arrFiltroEquipas as $x){

                                    if(strlen($x['nome'])>15){
                                        $nome = substr($x['nome'],0,14).'...';
                                    }else{
                                        $nome = $x['nome'];
                                    }

                                    echo '<div class="border-bottom border-primary">
                                            <a class="text-decoration-none text-black d-flex" href="javascript:AdicionarEquipaEventoModal('.$x['id'].','.$v['id'].')">
                                                <div class="w-75 text-dark">
                                                    <span id="nomeequipaaddmodal'.$x['id'].'">'.strip_tags($nome).'</span>
                                                </div>
                                                <div class="text-nowrap fs-7 mt-1 text-secondary">
                                                    Clique para adicionar
                                                </div>
                                            </a>
                                        </div>';

                                }

                                echo '</div>';

                            }else{
                                echo '<h6 class="text-primary" style="text-align:center">Não existem equipas a apresentar!</h6>';
                            }                                

                                echo '<div class="text-end mt-2"><a class="text-primary" href="equipas.php">Criar nova equipa</a></div>

                            </div>
                        </div>
                        
                    </div>
                </div>';

        }

        echo '</div>';

    }else{
        echo '<h4 class="text-primary" style="text-align:center;margin-top:20px">Não existem eventos!</h4>';
    }


?>