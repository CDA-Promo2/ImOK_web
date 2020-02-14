<div class="background"></div>
<div class="background-filter"></div>

<div class="container">

<h2 class="text-center my-5">Enregistrer un nouvel collaborateur</h2>

<div class="row justify-content-center">
	<div class="col-md-8 col-lg-6">
		<?= form_error() ?>
		<div method="POST" class="border shadow p-2 rounded bg-white">
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
		</div>
	</div>
</div>


</div>
