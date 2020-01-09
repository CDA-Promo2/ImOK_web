<h2 class="text-center">Enregistrer un nouvel employé</h2>

<div class="row justify-content-center">
	<div class="col-md-8 col-lg-6">
		<?= form_error() ?>
		<form action="<?=site_url('employee/create')?>" method="POST" class="border shadow p-2 rounded">
			<?= form_open_multipart(); ?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="lastname">Nom</label>
						<input type="text" class="form-control" placeholder="Nom de famile" id="lastname" name="lastname" value="<?= $_POST['lastname'] ?? '' ?>">
						<?= form_error('lastname') ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="firstname">Prénom</label>
						<input type="text" class="form-control" placeholder="Prénom" id="firstname" name="firstname" value="<?= $_POST['firstname'] ?? '' ?>">
						<?= form_error('firstname') ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="street">Adresse</label>
				<input type="text" class="form-control" id="street" name="street" placeholder="Adresse" value="<?= $_POST['street'] ?? '' ?>">
				<?= form_error('street') ?>
			</div>
			<div class="form-group">
				<label for="complement">Complément d'addresse</label>
				<input type="text" class="form-control" id="complement" name="complement" placeholder="Complément d'adresse" value="<?= $_POST['complement'] ?? '' ?>">
				<?= form_error('complement') ?>
			</div>
			<div class="form-group">
				<label for="id_cities">Ville</label>
				<input type="text" class="form-control" id="id_cities" name="id_cities" placeholder="Ville" value="<?= $_POST['id_cities'] ?? ''?>">
				<?= form_error('id_cities') ?>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="mail">Adresse mail</label>
						<input type="text" class="form-control" id="mail" name="mail" placeholder="Email" value="<?= $_POST['mail'] ?? ''?>">
						<?= form_error('mail') ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="phone">Téléphone</label>
						<input type="text" class="form-control" id="phone" name="phone" placeholder="Numéro de téléphone" value="<?= $_POST['phone'] ?? ''?>">
						<?= form_error('phone') ?>
					</div>
				</div>
			</div>
			<?php if($_SESSION['user']->id_roles == 1){ ?>
				<div class="form-group">
					<label for="id_roles">Rôle</label>
					<select name="id_roles" id="id_roles" class="form-control">
						<?php foreach($roles as $role){ ?>
							<option value="<?= $role->id?>" <?= (isset($_POST['id_riles']) && $role->id == $_POST['id_riles']) ? 'selected' : ''  ?>><?=$role->name?></option>
						<?php } ?>
					</select>
					<?= form_error('id_roles') ?>
				</div>
			<?php } ?>
			<button type="submit" class="btn btn-primary form-control">Enregistrer</button>
		</form>
	</div>
</div>
