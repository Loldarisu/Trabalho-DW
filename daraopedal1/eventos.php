<!DOCTYPE html>
<html lang="pt-pt">

    <?php include 'dist/includes/head.inc.php'; ?>

<body style="overflow-y: auto;">

    <?php include 'dist/includes/navbar.inc.php'; ?>

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
        <div class="modal-dialog">
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

    <?php include 'dist/includes/footer.inc.php'; ?>

    <!-- Correct Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
