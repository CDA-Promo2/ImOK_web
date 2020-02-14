<div class="modal" id="create_appointments" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h1 class="modal-title">Enregistrement d'un rendez-vous</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_error(); ?>
            <?= form_open_multipart(); ?>
            <div class='error_msg'></div>
            <div class="form-group my-1">
			    <label for="date_start">Date et heure de début</label> 
			    <input type="datetime-local" placeholder="Date et heure du début du rendez-vous" id="date_start" name="date_start" class="form-control" value="<?= $_POST['date_start'] ?? '' ?>">
		    </div>

            <div class="form-group my-1">
			    <label for="date_end">Date et heure de fin</label>
			    <input type="datetime-local" placeholder="Date et heure du fin du rendez-vous" id="date_end" name="date_end" class="form-control" value="<?= $_POST['date_end'] ?? '' ?>">
		    </div>

            <div class="form-group my-1">
			    <label for="note">Note</label>
			    <input type="textarea" placeholder="Note" id="note" name="note" class="form-control" value="<?= $_POST['note'] ?? '' ?>">
		    </div>

            <div class="form-group my-1">
			    <label for="id_appointment_types">Type</label>
			    <select name="id_appointment_types" class="form-control" id="id_appointment_types">
				    <option value="0" selected disabled>Veuillez choisir le type de rendez-vous</option>
				        <?php foreach ($appointment_types as $description): ?>
					        <option value="<?= $description->id ?>" <?= $_POST && $_POST['id_appointment_types'] == $description->id ? 'selected' : '' ?>><?= $description->id ?>. <?= $description->description ?></option>
				        <?php endforeach; ?>
			    </select>
		    </div>

            <div class="form-group my-1">
			    <label for="id_customers">Client</label>
			    <select name="id_customers" class="form-control" id="id_customers">
				    <option value="0" selected disabled>Veuillez choisir un Client</option>
				        <?php foreach ($customers as $customer): ?>
					        <option value="<?= $customer->id ?>" <?= $_POST && $_POST['id_customers'] == $customer->id ? 'selected' : '' ?>><?= $customer->id ?>. <?= $customer->lastname . ' ' . $customer->firstname  ?></option>
				        <?php endforeach; ?>
			    </select>
		    </div>

            <div class="form-group my-1">
			    <label for="id_employees">Employé</label>
			    <select name="id_employees" class="form-control" id="id_employees">
				    <option value="0" selected disabled>Veuillez choisir un Employé</option>
				        <?php foreach ($employees as $employee): ?>
					        <option value="<?= $employee->id ?>" <?= $_POST && $_POST['id_employees'] == $employee->id ? 'selected' : '' ?>><?= $employee->id ?>. <?= $employee->lastname . ' ' . $employee->firstname  ?></option>
				        <?php endforeach; ?>
			    </select>
		    </div>
      </div>
      <div class="modal-footer">
		<input type="submit" id="submit" class="form-control btn btn-success col-4" name="update">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>

$(function(){
    $('#submit').submit(function(event){
    event.preventDefault();
    var start_date = $('#date_start').val();
    var end_date = $('#date_end').val();
    var note = $('#note').val();
    var id_appointment_types = $('#name').val();
    var id_customers = $('#name').val();
    var id_employees = $('#name').val();
    $.ajax({
    type: 'POST',
    url: your controller path,
    data: {
    'date_start': start_date,
    'date_end': end_date,
    'note': note,
    'id_appointment_types': id_appointment_types,
    'id_customers': id_customers,
    'id_employees': id_employees
    },
    dataType: 'html',
    success: function(results){
    if(something not as you expected){
    $('.error_msg').html('error msg');
    return false;
    }
}
    });
    });
});

</script>