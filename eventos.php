<?php
require 'dist/includes/settings.inc.php';
include 'dist/includes/db.inc.php';
db_connect();
?>

<!DOCTYPE html>
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

    <div class="row">
        <div class="col-10 offset-1 col-md-5 offset-md-1" style="margin-left:50px">
            <div class="calendar-wrapper mt-5" id="calendar-wrapper"></div>
        </div>

        <div class="col-11 offset-1 col-md-5 offset-md-1" style="">
            <h3 class="text-primary mt-5">Eventos <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#CriarEventoModal" style="border-radius:50%;margin-left:20px"><i class="fas fa-plus"></i></button></h3>
            
            <div id="divajax">

                <!-- Chamada de dist/includes/ajax.inc.php feita em dist/js/calendar.js -->

                <!-- Sistema AJAX que permite atualizar a query dos eventos da base de
                dados quando se altera o dia, mês ou ano, mostrando apenas os eventos 
                do dia selecionado, caso existam! -->
                
            </div>

        </div>
    </div>

    <!-- Modal Criar Evento -->
    <div class="modal fade" id="CriarEventoModal" tabindex="-1" aria-labelledby="criareventolabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="criareventolabel">Criar Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="dist/includes/criarevento.inc.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nomeevento" class="form-label">Nome do Evento</label>
                            <input type="text" class="form-control" style="background:white" placeholder="ex: Volta a Portugal" id="nomeevento" name="nomeevento" minlength="3" maxlength="30" required>
                        </div>
                        <div class="mb-3">
                            <label for="infoevento" class="form-label">Informações do Evento</label>
                            <textarea class="form-control" rows="2" style="background:white" placeholder="ex: Localização" id="infoevento" name="infoevento" minlength="5" maxlength="200" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="infoevento" class="form-label">Data e Hora</label>
                            <input type="datetime-local" step="1" class="form-control" style="background-color:white;color:black" name="data" id="data" required>
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

    <!-- Modal Remover Equipa de Evento -->
    <div class="modal fade" id="RemoverEquipaEvento" tabindex="-1" aria-labelledby="labelremoverequipaevento" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelremoverequipaevento">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align:justify">
                    Deseja mesmo remover a equipa <span id="modalnomeequipa" style="font-weight:bold"></span> do evento 
                    <span id="modalnomeevento" style="font-weight:bold"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" style="color:white" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="dist/includes/removerequipaevento.inc.php" method="post">
                        <input type="hidden" name="idequipamodal" id="idequipamodal" value="">
                        <input type="hidden" name="ideventomodal" id="ideventomodal" value="">
                        <button type="submit" style="color:white" class="btn btn-danger">Remover</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Apagar Evento -->
    <div class="modal fade" id="ApagarEvento" tabindex="-1" aria-labelledby="labelapagarevento" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelapagarevento">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align:justify">
                    Deseja mesmo remover o evento: <span id="modalapagarevento" style="font-weight:bold"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" style="color:white" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="dist/includes/apagarevento.inc.php" method="post">
                        <input type="hidden" name="ideventoapagarmodal" id="ideventoapagarmodal" value="">
                        <button type="submit" style="color:white" class="btn btn-danger">Remover</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Adicionar Equipa a Evento -->
    <div class="modal fade" id="AdicionarEquipaEvento" tabindex="-1" aria-labelledby="labeladicionarequipaevento" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labeladicionarequipaevento">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align:justify">
                    Deseja mesmo adicionar a equipa <span id="modaladicionarnomeequipa" style="font-weight:bold"></span> ao evento 
                    <span id="modaladicionarnomeevento" style="font-weight:bold"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" style="color:white" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="dist/includes/adicionarequipaevento.inc.php" method="post">
                        <input type="hidden" name="idequipamodaladicionar" id="idequipamodaladicionar" value="">
                        <input type="hidden" name="ideventomodaladicionar" id="ideventomodaladicionar" value="">
                        <button type="submit" style="color:white" class="btn btn-success">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

        include 'dist/includes/footer.inc.php';

    ?>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="dist/js/calendar.js"></script>
    <script>

        var currentDate = new Date();
        var dd = String(currentDate.getDate()).padStart(2, '0');
        var mm = String(currentDate.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = currentDate.getFullYear();

        currentDate = mm + '/' + dd + '/' + yyyy;

        var config = `
            function selectDate(date) {
              $('#calendar-wrapper').updateCalendarOptions({
                date: date
              });
              console.log(calendar.getSelectedDate());
            }

            var defaultConfig = {
              weekDayLength: 1,
              date: '` + currentDate + `',
              onClickDate: selectDate,
              showYearDropdown: true,
              startOnMonday: true,
            };

            var calendar = $('#calendar-wrapper').calendar(defaultConfig);
            console.log(calendar.getSelectedDate());
            `;

        eval(config);

    </script>

    <script src="dist/js/main.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>

    <script>   

        $('.modal').on('hidden.bs.modal', function () {
            $('body').css("overflow-y","auto");
        });

    </script>

    <script>

        function RemoverEquipaEv(idequipa,idevento){
            document.getElementById("idequipamodal").value = idequipa;
            document.getElementById("ideventomodal").value = idevento;
            var myModal = new bootstrap.Modal(document.getElementById('RemoverEquipaEvento'));
            var text = document.getElementById("nomeequipa"+idequipa).innerText;
            document.getElementById("modalnomeequipa").innerText = text;
            var text = document.getElementById("nomeevento"+idevento).innerText;
            document.getElementById("modalnomeevento").innerText = text;            
            myModal.show();
        }

        function ApagarEventoModal(idevento){
            document.getElementById("ideventoapagarmodal").value = idevento;
            var myModal = new bootstrap.Modal(document.getElementById('ApagarEvento'));
            var text = document.getElementById("nomeevento"+idevento).innerText;
            document.getElementById("modalapagarevento").innerText = text;    
            myModal.show();
        }

        function AdicionarEquipaEventoModal(idequipa, idevento){
            document.getElementById("idequipamodaladicionar").value = idequipa;
            document.getElementById("ideventomodaladicionar").value = idevento;
            var myModal = new bootstrap.Modal(document.getElementById('AdicionarEquipaEvento'));
            var text = document.getElementById("nomeequipaaddmodal"+idequipa).innerText;
            document.getElementById("modaladicionarnomeequipa").innerText = text;
            var text = document.getElementById("nomeevento"+idevento).innerText;
            document.getElementById("modaladicionarnomeevento").innerText = text;   
            myModal.show();
        }

    </script>    

</body>

</html>