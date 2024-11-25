<!DOCTYPE html>
<html lang="pt-pt">

    <?php

        include 'dist/includes/head.inc.php';

    ?>

<body style="overflow-y: auto;">

    <?php

        include 'dist/includes/navbar.inc.php';

    ?>



<html>
<head>
    <title>Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e6f4ea;
        }
        .text-primary {
            color: #28a745 !important;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .modal-header, .modal-footer {
            border-color: #28a745;
        }
    </style>
</head>
<body class="overflow-y-auto">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-primary">Eventos</h3>
            <button type="button" class="btn btn-success rounded-circle" data-bs-toggle="modal" data-bs-target="#createEventModal">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>

    <!-- Modal Criar Evento -->
    <div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="createEventLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createEventLabel">Criar Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="eventName" class="form-label">Nome do Evento</label>
                            <input type="text" class="form-control" placeholder="ex: Volta a Portugal" id="eventName" name="eventName" minlength="3" maxlength="30" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventInfo" class="form-label">Informações do Evento</label>
                            <textarea class="form-control" rows="2" placeholder="ex: Localização" id="eventInfo" name="eventInfo" minlength="5" maxlength="200" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="eventDate" class="form-label">Data e Hora</label>
                            <input type="datetime-local" step="1" class="form-control" name="eventDate" id="eventDate" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>


    <?php

        include 'dist/includes/footer.inc.php';

    ?>

    
    
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

</body>

</html>