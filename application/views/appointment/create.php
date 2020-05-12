<div class="background"></div>
<div class="background-filter"></div>


<div class="container">
<?= $breadcrumb ?>

	<div class="card bg-white shadow">
		<div class="card-body">
			<?= form_open_multipart(); ?>

			<div class="row justify-content-between my-5">
				<div class="form col-md-6">

					<div class="form-group required">
						<label for="date_start">Date et heure de début</label>
						<?= form_error('date_start') ?>
						<input type="datetime-local" placeholder="Date et heure du début du rendez-vous" id="date_start" name="date_start" class="form-control" value="<?= $_POST['date_start'] ?? '' ?>">
					</div>

					<div class="form-group required">
							<label for="id_appointment_types">Employé</label><?= form_error('id_appointment_types') ?>
							<select type="text" name="id_appointment_types" id="id_appointment_types" class="form-control">
								<option selected disabled>Veuillez choisir le type de rendez-vous</option>
								<?php foreach ($appointment_types as $description): ?>
									<option value="<?= $description->id ?>" <?= isset($_POST['id_appointment_types']) && $_POST['id_appointment_types'] == $description->id ? 'selected' : '' ?> ><?= $description->description ?></option>
								<?php endforeach; ?>
							</select>
						</div>

				</div>

				<div class="form col-md-6">
					<?php if (!isset($_GET["id"])) { ?>
						<div class="form-group required">
							<label for="id_customers">Propriétaire</label><?= form_error('id_customers') ?>
							<select type="text" name="id_customers" id="id_customers" class="form-control">
								<option selected disabled>Choisissez un client</option>
								<?php foreach ($customers as $customer): ?>
										<option value="<?= $customer->id ?>" <?= isset($_POST['id_customers']) && $_POST['id_customers'] == $customer->id ? 'selected' : '' ?> ><?= $customer->lastname ?> <?= $customer->firstname ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<?php } else { ?>
							<input type="hidden" name="id_customers" id="id_customers" value="<?= $_GET["id"] ?>">
						<?php } ?>
					
					<div class="form-group required">
							<label for="id_employees">Employé</label><?= form_error('id_employees') ?>
							<select type="text" name="id_employees" id="id_employees" class="form-control">
								<option selected disabled>Veuillez choisir un Employé</option>
								<?php foreach ($employees as $employee): ?>
									<option value="<?= $employee->id ?>" <?= isset($_POST['id_employees']) && $_POST['id_employees'] == $employee->id ? 'selected' : '' ?> ><?= $employee->lastname ?> <?= $employee->firstname ?></option>
								<?php endforeach; ?>
							</select>
						</div>

				</div>


			</div>

			
			<div class="form-group my-1">
				<label for="note">Note</label> <?= form_error('note') ?>
				<input type="textarea" placeholder="Note" id="note" name="note" class="form-control" value="<?= $_POST['note'] ?? '' ?>">
			</div>

			<div class="row justify-content-around my-5">
				<a href="<?= site_url('appointment/') ?>" class="btn btn-secondary col-4">Retour</a>
				<input type="submit" class="form-control btn btn-success col-4" name="update">
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
