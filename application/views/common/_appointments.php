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
        console.log(e)
        $('#show_event .modal-body').html(
          '<h1>'+e.title+'</h1>'+
          '<div class="row">'+
          '<div class="col-md-4">'+
          '<h4>'+e.start._i+'</h4>'+
          '</div>'+
          '<div class="col-md-4">'+
          '<h4>'+e.end._i+'</h4>'+
          '</div>'+
          '</div>'+
          '<h4>'+e.end._i+'</h4>'+
          '<h4>'+e.id_customers+'</h4>'+
          '<h4>'+e.id_appointment_types+'</h4>'+
          '<h4>'+e.id_employees+'</h4>'
        );
        $('#show_event').modal();
      }
    })


</script>
   
</body>
</html> 