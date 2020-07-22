<div class="background"></div>
<div class="background-filter"></div>

<div class="container">

	<?= $breadcrumb ?? '<div class="my-5">breadcrumb</div>' ?>

	<div class="row justify-content-center">
		<div class="col-md-8 bg-white shadow p-3">
			<?= form_open_multipart(); ?>
			<div class="form-group my-1">
				<input type="radio" name="civility" value="0" <?= $client->civility == 1 ? 'checked' : ''?>> Madame
				<input type="radio" name="civility" value="1" <?= $client->civility == 0 ? 'checked' : ''?>> Monsieur
			</div>
			
			<div class="form-group my-1">
				<input type="hidden" name="date_register" value="<?= $client->date_register ?? '' ?>">
			</div>
			<div class="form-group my-1 required">
				<label for="lastname">Nom</label> <?= form_error('lastname') ?>
				<input type="text" placeholder="Nom du client" id="lastname" name="lastname" class="form-control" value="<?= $client->lastname ?? '' ?>">
			</div>
			<div class="form-group my-1 required">
				<label for="firstname">Prénom</label> <?= form_error('firstname') ?>
				<input type="text" placeholder="Prénom du client" id="firstname" name="firstname" class="form-control" value="<?= $client->firstname ?? '' ?>">
			</div>
			<div class="form-group my-1 required">
				<label for="id_marital_status">Statut</label><?= form_error('id_marital_status') ?>
				<select name="id_marital_status" class="form-control">
					<option value="0" selected>Veuillez choisir un Status</option>
					<?php foreach ($marital_status as $status): ?>
						<option value="<?= $status->id ?>" <?= $client->id_marital_status == $status->id ? 'selected' : '' ?>><?= $status->id ?>. <?= $status->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1 required">
				<label for="birthdate">Date de naissance</label> <?= form_error('birthdate') ?>
				<input type="date" id="birthdate" name="birthdate" class="form-control" value="<?= $client->birthdate ?? '' ?>">
			</div>
			<div class="form-group my-1 required">
				<label for="street">Adresse</label> <?= form_error('street') ?>
				<input type="text" Placeholder="Adresse du client" id="street" name="street" class="form-control" value="<?= $client->street ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<?= form_error('complement') ?>
				<input type="text" placeholder="Complément d'adresse du client" id="complement" name="complement" class="form-control" value="<?= $client->complement ?? '' ?>">
			</div>
			<div class="form-group required">
				<label for="city-search">Ville</label><?= form_error('id_cities') ?>
				<input type="hidden" id="city-id" name="city-id" value="<?= $client->id_cities ?? '' ?>" style="height: 20px;">
				<input id="city-search" name="city-search" class="typeahead form-control" type="text" value="<?= isset($client->id_cities) ? $client->name_cities . ' (' . $client->zip_code .')' : '' ?>">
				<div id="city-helper"></div>
			</div>
			<div class="form-group my-1 required">
				<label for="phone">Telephone</label> <?= form_error('phone') ?>
				<input type="text" id="phone" placeholder="Téléphone du client" name="phone" class="form-control" value="<?= $client->phone ?? '' ?>">
			</div>
			<div class="form-group my-1 required">
				<label for="mail">Mail</label> <?= form_error('mail') ?>
				<input type="email" id="mail" placeholder="Mail du client" name="mail" class="form-control" value="<?= $client->mail ?? '' ?>">
			</div>


			<div class="mt-3 d-flex justify-content-end">
				<a href="<?= site_url('customer/') ?>" class="btn btn-secondary mr-3">Retour</a>
				<input type="submit" class="btn btn-success" name="update">
			</div>
			<?= form_close() ?>
		</div>
	</div>

</div>