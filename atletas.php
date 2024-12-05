<!DOCTYPE html>
<html lang="pt-pt">

<?php include 'dist/includes/head.inc.php'; ?>

<body>

    <!-- Navbar Include -->
    <?php include 'dist/includes/navbar.inc.php'; ?>

    <!-- Header Section -->
    <div class="header text-center">
        <h1 class="page-title">Gerir Atletas</h1>
        <p class="page-subtitle">Adicione, edite ou consulte informações sobre os atletas</p>
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Search Form -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="atletas.php" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Procurar..." id="search" name="search" required>
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a href="atletas.php" class="btn btn-outline-secondary">
                                    <i class="fas fa-eraser"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Add Athlete Form -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Adicionar Atleta</h2>
                        <form action="dist/includes/atletas.inc.php" method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: João" minlength="3" maxlength="30" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@exemplo.com" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="peso" class="form-label">Peso</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="peso" name="peso" min="1" max="200" step=".1" required>
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="altura" class="form-label">Altura</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="altura" name="altura" min="1" max="3" step=".01" required>
                                        <span class="input-group-text">m</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="potfunc" class="form-label">Potência Funcional</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="potfunc" name="potfunc" min="1" max="10" step=".01" required>
                                    <span class="input-group-text">W/Kg</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="genero" class="form-label">Gênero</label>
                                <select class="form-select" id="genero" name="genero" required>
                                    <option value="M" selected>Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="data" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Include -->
    <?php include 'dist/includes/footer.inc.php'; ?>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
