<h1 class="text-center"><?= $title ?></h1>
<hr>
<?= form_error(); ?>
<div class="row justify-content-center">
    <div class="form col-md-12 col-lg-8 mt-5">
		<?= form_open_multipart(); ?>
		<div class="form-group my-1">
			<input type="hidden" name="date_register" value="<?= date('Y-m-d') ?>">
		</div>
		<div class="form-group my-1">
			<input type="radio" name="civility" value="0"> Madame
			<input type="radio" name="civility" value="1"> Monsieur
		</div>
		<div class="form-group my-1 required">
			<label for="lastname">Nom</label> <?= form_error('lastname') ?>
			<input type="text" placeholder="Nom du client" id="lastname" name="lastname" class="form-control" value="<?= $_POST['lastname'] ?? '' ?>">
		</div>
		<div class="form-group my-1 required">
			<label for="firstname">Prénom</label> <?= form_error('firstname') ?>
			<input type="text" placeholder="Prénom du client" id="firstname" name="firstname" class="form-control" value="<?= $_POST['firstname'] ?? '' ?>">
		</div>
		<div class="form-group my-1 required">
			<label for="id_marital_status">Statut</label><?= form_error('id_marital_status') ?>
			<select name="id_marital_status" class="form-control">
				<option value="0" selected>Veuillez choisir un Status</option>
				<?php foreach ($marital_status as $status): ?>
					<option value="<?= $status->id ?>" <?= $_POST && $_POST['id_marital_status'] == $status->id ? 'selected' : '' ?>><?= $status->id ?>. <?= $status->name ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group my-1 required">
            <label for="birthdate">Date de naissance</label> <?= form_error('birthdate') ?>
            <input type="date" id="birthdate" name="birthdate" class="form-control" value="<?= $_POST['birthdate'] ?? '' ?>">
		</div>
		<div class="form-group my-1 required">
			<label for="street">Adresse</label> <?= form_error('street') ?>
			<input type="text" Placeholder="Adresse du client" id="street" name="street" class="form-control" value="<?= $_POST['street'] ?? '' ?>">
		</div>
		<div class="form-group my-1">
			 <?= form_error('complement') ?>
			<input type="text" placeholder="Complément d'adresse du client" id="complement" name="complement" class="form-control" value="<?= $_POST['complement'] ?? '' ?>">
		</div>
		<div class="form-group my-1 required">
			<label for="phone">Telephone</label> <?= form_error('phone') ?>
			<input type="text" id="phone" placeholder="Téléphone du client" name="phone" class="form-control" value="<?= $_POST['phone'] ?? '' ?>">
		</div>
		<div class="form-group my-1 required">
			<label for="mail">Mail</label> <?= form_error('mail') ?>
			<input type="email" id="mail" placeholder="Mail du client" name="mail" class="form-control" value="<?= $_POST['mail'] ?? '' ?>">
		</div>

		<div class="form-group my-1 required">
			<label for="id_cities">Ville</label><?= form_error('id_cities') ?>
			<input type="hidden" id="id_cities" name="id_cities" value="<?= $_POST['id_cities'] ?? '' ?>"/>
			<input id="city" placeholder="Ville du client (en autocompletion)" name="city" class="typeahead form-control" type="text" value="">
		</div>
			
		<div class="row justify-content-around my-5">
			<a href="<?= site_url('customer/') ?>" class="btn btn-secondary col-4">Retour</a>
			<input type="submit" class="form-control btn btn-success col-4" name="update">
		</div>
	</div>
</div>
