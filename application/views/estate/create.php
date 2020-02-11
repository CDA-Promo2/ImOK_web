<h1 class="text-center"><?= $title ?></h1>
<hr>
<div class="container">
	<?= form_error() ?>
	<?= form_open_multipart(); ?>
	<div class="row justify-content-center">
		<div class="col">
			<div class="form-group my-1">
				<label for="id_customers">Propriétaire</label> <span class="error">* <?= form_error('id_customers') ?></span>
				<select name="id_customers" id="id_customers" class="form-control">
					<option value="" selected>Veuillez choisir un client</option>
					<?php foreach ($customerList as $customer): ?>
						<option value="<?= $customer->id ?>" <?= isset($_POST['id_customers']) && $_POST['id_customers'] == $customer->id ? 'selected' : '' ?> ><?= $customer->lastname ?> <?= $customer->firstname ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="city">Ville</label> <span class="error">* <?= form_error('id_cities') ?></span>
				<input type="hidden" id="id_cities" name="id_cities" value=""/>
				<input id="city" name="city" class="typeahead form-control" type="text" value="">
			</div>
			<div class="form-group my-1">
				<label for="district">Secteur</label> <?= form_error('district') ?>
				<input type="text" id="district" name="district" class="form-control" value="<?= $_POST['id_cities'] ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="street">Adresse</label> <span class="error">* <?= form_error('street') ?></span>
				<input type="text" id="street" name="street" class="form-control" value="<?= $_POST['street'] ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="complement">Complément d'adresse</label> <?= form_error('complement') ?>
				<input type="text" id="complement" name="complement" class="form-control" value="<?= $_POST['complement'] ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="renovation">Rénovation ?</label> <span class="error">* <?= form_error('renovation') ?> </span>
				<select name="renovation" id="renovation" class="form-control">
					<option value="" selected >---</option>
					<option value="0" <?= isset($_POST['renovation']) && $_POST['renovation'] === 0 ? 'selected' : '' ?>>Non</option>
					<option value="1" <?= isset($_POST['renovation']) && $_POST['renovation'] == 1 ? 'selected' : '' ?>>Oui</option>
				</select>
			</div>
		</div>
		<div class="col">
			<div class="form-group my-1">
				<label for="id_estate_types">Type de bien</label> <span class="error">* <?= form_error('id_estate_types') ?></span>
				<select name="id_estate_types" id="id_estate_types" class="form-control">
					<option value="" selected>Veuillez choisir un type de bien</option>
					<?php foreach ($estateTypeList as $estateType): ?>
						<option value="<?= $estateType->id ?>" <?= isset($_POST['id_estate_types']) && $_POST['id_estate_types'] == $estateType->id ? 'selected' : '' ?>><?= $estateType->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="floor">Etage</label> <span class="error">* <?= form_error('floor') ?></span>
				<input type="text" id="floor" name="floor" class="form-control" value="<?= $_POST['floor'] ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="id_build_date">Date de construction</label> <span class="error">* <?= form_error('id_build_date') ?></span>
				<select name="id_build_date" id="build_date" class="form-control">
					<option value="" selected >---</option>
					<?php foreach ($dates as $date): ?>
						<option value="<?= $date->id ?>" <?= isset($_POST['id_build_date']) && $_POST['id_build_date'] == $date->id ? 'selected' : '' ?>><?= $date->period ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="condominium">Mitoyen ?</label> <span class="error">* <?= form_error('condominium') ?></span>
				<select name="condominium" id="condominium" class="form-control">
					<option value=""  selected >---</option>
					<option value="0" <?= isset($_POST['condominium']) && $_POST['condominium'] === 0 ? 'selected' : '' ?>>Non</option>
					<option value="1" <?= isset($_POST['condominium']) && $_POST['condominium'] == 1 ? 'selected' : '' ?>>Oui</option>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="joint_ownership">Copropriété</label> <span class="error">* <?= form_error('joint_ownership') ?></span>
				<select name="joint_ownership" id="joint_ownership" class="form-control">
					<option value=""  selected >---</option>
					<option value="0" <?= isset($_POST['joint_ownership']) && $_POST['joint_ownership'] === 0 ? 'selected' : '' ?>>Non</option>
					<option value="1" <?= isset($_POST['joint_ownership']) && $_POST['joint_ownership'] == 1 ? 'selected' : '' ?>>Oui</option>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="floor_number">Nombre d'étages</label> <span class="error">* <?= form_error('floor_number') ?></span>
				<input type="text" id="floor_number" name="floor_number" class="form-control" value="<?= $_POST['floor_number'] ?? '' ?>">
			</div>
		</div>
		<div class="col">
			<div class="form-group my-1">
				<label for="id_expositions">Exposition</label> <span class="error">* <?= form_error('id_expositions') ?></span>
				<select name="id_expositions" id="expositions" class="form-control">
					<option value="" selected >Veuillez choisir une exposition</option>
					<?php foreach ($expositionsList as $exposition): ?>
						<option value="<?= $exposition->id ?>" <?= isset($_POST['id_expositions']) && $_POST['id_expositions'] == $exposition->id ? 'selected' : '' ?>><?= $exposition->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="size">Surface (en m²)</label> <span class="error">* <?= form_error('size') ?></span>
				<input type="text" id="size" name="size" class="form-control" value="<?= $_POST['size'] ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="carrez_size">Surface Carrez (en m²)</label> <span class="error">* <?= form_error('carrez_size') ?></span>
				<input type="text" id="carrez_size" name="carrez_size" class="form-control" value="<?= $_POST['carrez_size'] ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="rooms_numbers">Nombre de pièces</label> <span class="error">* <?= form_error('rooms_numbers') ?></span>
				<input type="text" id="rooms_numbers" name="rooms_numbers" class="form-control" value="<?= $_POST['rooms_numbers'] ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="bedroom_numbers">Nombre de chambres</label> <span class="error">* <?= form_error('bedroom_numbers') ?></span>
				<input type="text" id="bedroom_numbers" name="bedroom_numbers" class="form-control" value="<?= $_POST['bedroom_numbers'] ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="id_outside_conditions">Extérieur</label> <span class="error">* <?= form_error('id_outside_conditions') ?></span>
				<select name="id_outside_conditions" id="outside_conditions" class="form-control">
					<option value="" selected >Veuillez choisir une condition</option>
					<?php foreach ($outsideConditionList as $outsideCondition): ?>
						<option value="<?= $outsideCondition->id ?>" <?= isset($_POST['id_outside_conditions']) && $_POST['id_outside_conditions'] == $outsideCondition->id ? 'selected' : '' ?>><?= $outsideCondition->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>
	<div class="row justify-content-around my-5">
		<a href="<?= site_url().'/estate' ?>" class="btn btn-secondary col-4">Retour</a>
		<input type="submit" class="form-control btn btn-success col-4" name="createEstate">
	</div>
	<?php form_close() ?>
</div>
