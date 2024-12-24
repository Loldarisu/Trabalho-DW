<nav class="navbar navbar-expand-lg navbar-light bg-primary shadow" style="z-index: 1;">
  <div class="container-fluid" style="margin: 0 50px 0 50px">

    <a href="<?php echo $arrSETTINGS['url_site']; ?>"><img src="images/logo.png" alt="Dar ao Pedal" style="width:100px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>



    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown d-flex">
          <i id="darkModeIcon" onclick="darkMode()" class="fas fa-moon my-auto text-dark m-0 darkmodeSwitch fs-5"></i>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="eventos.php">Eventos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="equipas.php">Equipas</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="atletas.php">Atletas</a>
        </li>
      </ul>

    </div>
  </div>
</nav>