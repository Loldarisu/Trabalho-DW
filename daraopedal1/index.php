

<!DOCTYPE HTML>
<html lang="pt-pt">


<body style="overflow-y: auto;">

  <?php

    include 'dist/includes/navbar.inc.php';

  ?>


<html>
 <head>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body>
  <div class="carousel carousel-dark slide" data-bs-pause="false" data-bs-ride="carousel" id="carouselExampleDark">
   <div class="carousel-indicators">
    <button aria-current="true" aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleDark" type="button">
    </button>
    <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleDark" type="button">
    </button>
    <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleDark" type="button">
    </button>
   </div>
   <div class="" style="position:absolute;z-index:1;left: 0; right: 0; margin-left: auto; margin-right: auto; width: 300px;margin-top:5%">
    <h1 class="text-dark" style="text-align:center;margin-bottom:30px">
     Dar ao Pedal
    </h1>
    <p>
     <a class="btn border-0" href="#quemsomos" style="width:100%;background-color: #0b2027;color:#8FC0A9">
      Quem Somos?
     </a>
    </p>
    <p>
     <a class="btn border-0" href="#regras" style="width:100%;background-color: #0b2027;color:#8FC0A9">
      Regras
     </a>
    </p>
   </div>
   <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="4000">
     <img alt="Image of cyclists " class="d-block w-100" height="400" src="images/slide1.jpg" width="800"/>
     <div class="carousel-caption d-none d-md-block">
      <h5>
       Bem Vindo!
      </h5>
      <p>
       Consulte os eventos do ciclismo.
      </p>
     </div>
    </div>
    <div class="carousel-item" data-bs-interval="4000">
     <img alt="Image of a cyclist " class="d-block w-100" height="400" src="images/slide2.jpg" width="800"/>
     <div class="carousel-caption d-none d-md-block">
      <h5>
       Bem Vindo!
      </h5>
      <p>
       Veja as equipas de ciclismo e os seus atletas.
      </p>
     </div>
    </div>
    <div class="carousel-item" data-bs-interval="4000">
     <img alt="Image of a cycling" class="d-block w-100" height="400" src="images/slide3.jpg" width="800"/>
     <div class="carousel-caption d-none d-md-block">
      <h5>
       Bem Vindo!
      </h5>
      <p>
       Desfrute das funcionalidades do website.
      </p>
     </div>
    </div>
   </div>
   <style>
    .carousel-item img {
                opacity: 0.7;
            }
   </style>
   <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleDark" type="button">
    <span aria-hidden="true" class="carousel-control-prev-icon">
    </span>
    <span class="visually-hidden">
     Anterior
    </span>
   </button>
   <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleDark" type="button">
    <span aria-hidden="true" class="carousel-control-next-icon">
    </span>
    <span class="visually-hidden">
     Seguinte
    </span>
   </button>
  </div>
  <section style="margin-top: 30px;">
   <h3 class="text-primary" id="quemsomos" style="text-align:center">
    Quem Somos?
   </h3>
   <p class="text-primary" style="padding: 30px;text-align: center;">
    Dar ao Pedal surgiu de um trabalho no qual se pretendia criar uma aplicação Web para ajudar 
            um gestor desportivo a alocar os atletas da sua equipa por subequipas (formações) que vão competir em provas.
            Assim, eu, Pedro Moreira, aluno do 3º ano de IG, desenvolvi este 
            website, desde o seu código.
   </p>
   <p class="text-primary" style="text-align: center;padding: 30px;">
    Aqui é possível consultar, adicionar, editar e eliminar tanto atletas como equipas e 
            eventos, cumprindo assim as características CRUD.
   </p>
   <p style="text-align: center;">
    <img alt="Logo of Dar ao Pedal" height="200" src="images/logo.png" width="200"/>
   </p>
  </section>
  <section style="margin-top: 50px;padding: 30px;">
   <h3 class="text-primary" id="regras" style="text-align:center">
    Regras
   </h3>
   <table class="table table-hover text-primary" style="margin-top: 30px;">
    <thead>
     <p class="text-primary" style="margin-top: 30px;">
      Escalões de Potência:
     </p>
     <tr>
      <th scope="col">
       Categoria
      </th>
      <th scope="col">
       Masculinos
      </th>
      <th scope="col">
       Femininos
      </th>
     </tr>
    </thead>
    <tbody>
     <tr>
      <th scope="row">
       A
      </th>
      <td>
       &gt; 4.0w/kg FTP e mínimo 250W FTP
      </td>
      <td>
       &gt; 3.7w/kg FTP
      </td>
     </tr>
     <tr>
      <th scope="row">
       B
      </th>
      <td>
       3.20w/kg até 3.99wkg FTP e mínimo 200W FTP
      </td>
      <td>
       3.20w/kg 3.69w/kg FTP
      </td>
     </tr>
     <tr>
      <th scope="row">
       C
      </th>
      <td>
       2.5w/kg até 3.19wkg FTP e mínimo 150W FTP
      </td>
      <td>
       2.5w/kg até 3.19w/kg FTP
      </td>
     </tr>
     <tr>
      <th scope="row">
       D
      </th>
      <td>
       &lt; 2.49wkg FTP
      </td>
      <td>
       &lt; 2.49w/kg FTP
      </td>
     </tr>
    </tbody>
   </table>
   <table class="table table-hover text-primary" style="margin-top: 30px;">
    <thead>
     <p class="text-primary" style="margin-top: 30px;">
      Regras para participação em provas (masculino):
     </p>
     <tr>
      <th scope="col">
       Categoria
      </th>
      <th scope="col">
       5 a 8 atletas
      </th>
      <th scope="col">
       3 ou 4 atletas
      </th>
      <th scope="col">
       Classe da equipa
      </th>
     </tr>
    </thead>
    <tbody>
     <tr>
      <th scope="row">
       A
      </th>
      <td>
       Max. 3
      </td>
      <td>
       Max. 2
      </td>
      <td>
       Treino 3
      </td>
     </tr>
     <tr>
      <th scope="row">
       B
      </th>
      <td>
       Max. 3
      </td>
      <td>
       Max. 2
      </td>
      <td>
       Treino 2
      </td>
     </tr>
     <tr>
      <th scope="row">
       C
      </th>
      <td>
       Max. 3
      </td>
      <td>
       Max. 2
      </td>
      <td>
       Treino 1
      </td>
     </tr>
     <tr>
      <th scope="row">
       D
      </th>
      <td>
       S. Limite
      </td>
      <td>
       S. Limite
      </td>
      <td>
       Treino 0
      </td>
     </tr>
    </tbody>
   </table>
   <table class="table table-hover text-primary" style="margin-top: 30px;">
    <thead>
     <p class="text-primary" style="margin-top: 30px;">
      Regras para participação em provas (feminino):
     </p>
     <tr>
      <th scope="col">
       Categoria
      </th>
      <th scope="col">
       5 a 8 atletas
      </th>
      <th scope="col">
       3 ou 4 atletas
      </th>
      <th scope="col">
       Classe da equipa
      </th>
     </tr>
    </thead>
    <tbody>
     <tr>
      <th scope="row">
       A
      </th>
      <td>
       Max. 3
      </td>
      <td>
       Max. 2
      </td>
      <td>
       Treino 3
      </td>
     </tr>
     <tr>
      <th scope="row">
       B
      </th>
      <td>
       Max. 3
      </td>
      <td>
       Max. 2
      </td>
      <td>
       Treino 2
      </td>
     </tr>
     <tr>
      <th scope="row">
       C
      </th>
      <td>
       S. Limite
      </td>
      <td>
       S. Limite
      </td>
      <td>
       Treino 1
      </td>
     </tr>
     <tr>
      <th scope="row">
       D
      </th>
      <td>
       S. Limite
      </td>
      <td>
       S. Limite
      </td>
      <td>
       Treino 0
      </td>
     </tr>
    </tbody>
   </table>
  </section>
  <script crossorigin="anonymous" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+Gx0f4g5Y2b4Xr+6nb1p1F9b5gWFG" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
  </script>
 </body>
</html>


  </section>


  <?php

    include 'dist/includes/footer.inc.php';

  ?>
  

  <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>



    
  </style>




</body>



</html>