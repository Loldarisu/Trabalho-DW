
<?php include 'dist/includes/head.inc.php';?>

<body class="eventos-page">

    <!-- Include Navbar -->
    <?php include 'dist/includes/navbar.inc.php'; ?>

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

    <!-- Include Footer -->
    <?php include 'dist/includes/footer.inc.php'; ?>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="dist/js/calendar.js"></script>


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

</body>

</html>
