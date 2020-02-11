<h2 class="text-center">Profil de <?= $employee->firstname.' '.$employee->lastname ?></h2>

<div class="row justify-content-center">
	<div class="col-md-8 col-lg-6">
		<?= form_error() ?>
		<form action="<?=site_url('employee/edit/'.$employee->id)?>" method="POST" class="border shadow p-2 rounded">
			<?= form_open_multipart(); ?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="lastname">Nom</label>
						<input type="text" class="form-control" id="lastname" name="lastname" value="<?= $employee->lastname?>">
						<?= form_error('lastname') ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="firstname">Prénom</label>
						<input type="text" class="form-control" id="firstname" name="firstname" value="<?= $employee->firstname?>">
						<?= form_error('firstname') ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="mail">Adresse mail</label>
						<input type="text" class="form-control" id="mail" name="mail" value="<?= $employee->mail?>">
						<?= form_error('mail') ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="phone">Téléphone</label>
						<input type="text" class="form-control" id="phone" name="phone" value="<?= $employee->phone?>">
						<?= form_error('phone') ?>
					</div>
				</div>
			</div>
			<?php if($_SESSION['user']->id_roles == 1){ ?>
				<div class="form-group">
					<label for="id_roles">Rôle</label>
					<select name="id_roles" id="id_roles" class="form-control">
						<?php foreach($roles as $role){ ?>
							<option value="<?= $role->id?>" <?= ($role->id == $employee->id_roles) ? 'selected' : ''  ?>><?=$role->name?></option>
						<?php } ?>
					</select>
					<?= form_error('id_roles') ?>
				</div>
			<?php } ?>
			<button type="submit" class="btn btn-primary form-control">Modifier</button>
		</form>
	</div>
</div>
