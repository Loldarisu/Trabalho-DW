<!DOCTYPE HTML>
<html lang="pt-pt">

  <?php include 'dist/includes/head.inc.php';?>

<body style="overflow-y: auto;">

  <?php
     include 'dist/includes/navbar.inc.php';
  ?>
    
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-pause="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="" style="position:absolute;z-index:1;left: 0; right: 0; margin-left: auto; margin-right: auto; width: 300px;margin-top:5%">

      <h1 class="text-dark" style="text-align:center;margin-bottom:30px">Dar ao Pedal</h1>
      <p>
        <a href="#quemsomos" class="btn border-0" style="width:100%;background-color: #0b2027;color:#8FC0A9">Quem Somos?</a>
      </p>

      <p>
        <a href="#regras" class="btn border-0" style="width:100%;background-color: #0b2027;color:#8FC0A9">Regras</a>
      </p>  

    </div>

    <div class="carousel-inner">

      <div class="carousel-item active" data-bs-interval="5000">
        <img src="images/slide1.jpg" class="d-block w-100" alt="Ciclismo">
        <div class="carousel-caption d-none d-md-block">
          <h5>Bem Vindo!</h5>
          <p>Consulte os eventos do ciclismo.</p>
        </div>
        
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="images/slide2.jpg" class="d-block w-100" alt="Pedalar">
        <div class="carousel-caption d-none d-md-block">
          <h5>Bem Vindo!</h5>
          <p>Veja as equipas de ciclismo e os seus atletas.</p>
        </div>
        
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="images/slide3.jpg" class="d-block w-100" alt="Competição">
        <div class="carousel-caption d-none d-md-block">
          <h5>Bem Vindo!</h5>
          <p>Desfrute das funcionalidades do website.</p>
        </div>
    
      </div>

      <style>

          .carousel-item img {
            opacity: 0.7;
          }
      </style>
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Seguinte</span>
    </button>
  </div>

  <section style="margin-top: 30px;">
    <h3 class="text-primary" style="text-align:center" id="quemsomos">Quem Somos?</h3>
    <p class="text-primary" style="padding: 30px;text-align: center;">Dar ao Pedal surgiu de um trabalho no qual se pretendia criar uma aplicação Web para ajudar 
      um gestor desportivo a alocar os atletas da sua equipa por subequipas (formações) que vão competir em provas.
      Assim, eu, Pedro Miguel Vieira Moreira, aluno do 3º ano de Informatica de gestão, desenvolvi este 
      website, desde o seu código e base de dados até ao design envolvido de modo a satisfazer as necessidades do utilizador e agradar a quem utiliza o Dar ao Pedal.
    </p>
    <p class="text-primary" style="text-align: center;padding: 30px;">Aqui é possível consultar, adicionar, editar e eliminar tanto atletas como equipas e 
    eventos</p>
    <p style="text-align: center;"><img src="images/logo.png" alt=""></p>
  </section>  
  <section style="margin-top: 50px;padding: 30px;">
    <h3 class="text-primary" style="text-align:center" id="regras">Regras</h3>

    <table class="table table-hover text-primary" style="margin-top: 30px;">
      <thead>
        <p class="text-primary" style="margin-top: 30px;">Escalões de Potência</p>
        <tr>
          
          <th scope="col">Categoria</th>
          <th scope="col">Masculinos</th>
          <th scope="col">Femininos</th>
          
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">A</th>
          <td>> 4.0w/kg FTP e mínimo 250W FTP</td>
          <td>> 3.7w/kg FTP</td>
          
        </tr>
        <tr>
          <th scope="row">B</th>
          <td> 3.20w/kg até 3.99wkg FTP e mínimo 200W FTP </td>
          <td>3.20w/kg 3.69w/kg FTP</td>
          
        </tr>
        <tr>
          <th scope="row">C</th>
          <td>2.5w/kg até 3.19wkg FTP e mínimo 150W FTP</td>
          <td>2.5w/kg até 3.19w/kg FTP</td>
          
        </tr>
        <tr>
          <th scope="row">D</th>
          <td>< 2.49wkg FTP</td>
          <td>< 2.49w/kg FTP</td>

        </tr>
      </tbody>
    </table>

    <table class="table table-hover text-primary" style="margin-top: 30px;">
      <thead>
        <p class="text-primary" style="margin-top: 30px;">Regras para participação em provas (masculino)</p>
        <tr>
          <th scope="col">Categoria</th>
          <th scope="col">5 a 8 atletas</th>
          <th scope="col">3 ou 4 atletas</th>
          <th scope="col">Classe da equipa</th>
          
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">A</th>
          <td>Max. 3</td>
          <td>Max. 2</td>
          <td>Treino 3</td>
        </tr>
        <tr>
          <th scope="row">B</th>
          <td>Max. 3</td>
          <td>Max. 2</td>
          <td>Treino 2</td>
        </tr>
        <tr>
          <th scope="row">C</th>
          <td>Max. 3</td>
          <td>Max. 2</td>
          <td>Treino 1</td>
        </tr>
        <tr>
          <th scope="row">D</th>
          <td>S. Limite</td>
          <td>S. Limite</td>
          <td>Treino 0</td>
        </tr>
      </tbody>
    </table>

    <table class="table table-hover text-primary" style="margin-top: 30px;">
      <thead>
        <p class="text-primary" style="margin-top: 30px;">Regras para participação em provas (feminino)</p>
        <tr>
          <th scope="col">Categoria</th>
          <th scope="col">5 a 8 atletas</th>
          <th scope="col">3 ou 4 atletas</th>
          <th scope="col">Classe da equipa</th>
          
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">A</th>
          <td>Max. 3</td>
          <td>Max. 2</td>
          <td>Treino 3</td>
        </tr>
        <tr>
          <th scope="row">B</th>
          <td>Max. 3</td>
          <td>Max. 2</td>
          <td>Treino 2</td>
        </tr>
        <tr>
          <th scope="row">C</th>
          <td>S. Limite</td>
          <td>S. Limite</td>
          <td>Treino 1</td>
        </tr>
        <tr>
          <th scope="row">D</th>
          <td>S. Limite</td>
          <td>S. Limite</td>
          <td>Treino 0</td>
        </tr>
      </tbody>
    </table>

  </section>

  <?php

    include 'dist/includes/footer.inc.php';

  ?>


  <script type="text/javascript" src="dist/js/main.js"></script>
  <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>


</body>



</html>