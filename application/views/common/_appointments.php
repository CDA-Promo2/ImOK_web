<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
</head>
<body>
    <div class="row" style="width:100%">
       <div class="col-md-12">
           <div id="calendar"></div>
       </div>
    </div>
    

<script type="text/javascript">
   
    var events = <?php echo json_encode($data) ?>;
    
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
           
    $('#calendar').fullCalendar({
      //Permet de mettre les mois et les jours en Français sur Fullcalendar
      monthNames:['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
      monthNamesShort:['janv.', 'févr.', 'mars', 'avr.', 'mai', 'juin', 'juil.', 'août', 'sept.', 'oct.', 'nov.', 'déc.'],
      dayNames:['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
      dayNamesShort:['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],

      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'Aujourd\'hui',
        month: 'Mois',
        week : 'Semaine',
        day  : 'Jour'
      },
      events    : events,
      eventClick: function(e) {
        
        var start = e.start._i;
        var start_date = start.split(" ", 2);

        $('#show_event .modal-header').html(
          `<h3>${e.title}</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>`
        );

        $('#show_event .modal-body').html(
        `<div class="row">
        <div class="col-md-6">
        <dl>
        <dt>Date :</dt>
        <dd> ${start_date[0]} </dd>
        <dt>Heure de début :</dt>
        <dd> ${start_date[1]} </dd>
        <dt>Employé concerné :</dt>
        <dd> ${e.firstnameEmployees} ${e.lastnameEmployees} </dd>
        <dt>Type de rendez-vous :</dt>
        <dd> ${e.description} </dd>
        </dl>
        </div>
        <div class="col-md-6">
        <dl>
        <dt>Client :</dt>
        <dd> ${e.firstnameCustomers} ${e.lastnameCustomers} </dd>
        <dt>Téléphone :</dt>
        <dd> ${e.phoneCustomers} </dd>
        <dt>Mail :</dt>
        <dd> ${e.mailCustomers} </dd>
        <dt>Ville :</dt>
        <dd> ${e.citiesCustomers} </dd>
        <dt>Adresse :</dt>
        <dd> ${e.streetCustomers}, ${e.codeCustomers} </dd>
        </dl>
        </div>
        </div>`
        );

        $('#show_event .modal-footer').html(
          `<div class="d-flex justify-content-between">
          <a href="/imok_web/current/appointment/edit/${e.id_customers}/${e.id_employees}/${start_date[0]}:${start_date[1]}" class="btn btn-secondary"><i class="fas fa-pen"></i> Modifier</a>
          <button type="button" data-toggle="modal" data-target="#delete${e.id}" class="btn btn-danger"><i class="fas fa-archive"></i> Archiver</button>
          </div>`
        );

        $('#show_event').modal();
      }
    })


</script>
   
</body>
</html> 