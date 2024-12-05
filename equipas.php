<!DOCTYPE HTML>
<html lang="pt-pt">

<body style="overflow-y: auto;">

    <?php

    include 'dist/includes/navbar.inc.php';

    ?>



    <title>Equipas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-0 col-10 offset-1">
                <div class="px-5">
                    <div class="px-1">
                        <form action="equipas.php" method="get">
                            <div class="input-group mt-4 shadow rounded">
                                <input type="text" class="form-control border-0 text-secondary bg-light" placeholder="Procurar..." id="search" name="search" required>
                                <span class="input-group-btn">
                                    <button class="nav-link me-1 text-dark" style="background:transparent;border:0" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>

                    <!-- Categoria A -->
                    <div class="accordion-button border-0 border-bottom border-primary p-0 bg-light collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#CategoriaA" aria-expanded="false" aria-controls="CategoriaA">
                        <div class="fs-4 ms-3 py-1 bg-light text-primary">Categoria A</div>
                    </div>

                    <!-- Categoria B -->
                    <div class="accordion-button border-0 border-bottom border-primary p-0 bg-light collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#CategoriaB" aria-expanded="false" aria-controls="CategoriaB">
                        <div class="fs-4 ms-3 py-1 bg-light text-primary">Categoria B</div>
                    </div>

                    <!-- Categoria C -->
                    <div class="accordion-button border-0 border-bottom border-primary p-0 bg-light collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#CategoriaC" aria-expanded="false" aria-controls="CategoriaC">
                        <div class="fs-4 ms-3 py-1 bg-light text-primary">Categoria C</div>
                    </div>

                    <!-- Categoria D -->
                    <div class="accordion-button border-0 border-bottom border-primary p-0 bg-light collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#CategoriaD" aria-expanded="false" aria-controls="CategoriaD">
                        <div class="fs-4 ms-3 py-1 bg-light text-primary">Categoria D</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 offset-md-0 col-10 offset-1">
                <h3 class="text-primary mt-4">Equipas 
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#CriarEquipaModal" style="border-radius:50%;margin-left:20px">
                        <i class="fas fa-plus"></i>
                    </button>
                </h3>
            </div>
        </div>
    </div>
    
    <?php

include 'dist/includes/footer.inc.php';

?>

<script type="text/javascript" src="dist/js/main.js"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>


</html>