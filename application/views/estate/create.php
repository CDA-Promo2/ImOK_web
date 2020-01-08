<h1 class="text-center"><?= $title ?></h1>
<hr>
<div class="container">
	<?= form_error() ?>
	<?= form_open_multipart(); ?>
	<div class="row justify-content-center">
		<div class="col-3">
			<div class="form-group my-1">
				<label for="owner">Propriétaire</label>
				<select name="owner" id="owner" class="form-control">
					<option value="0" selected disabled>---</option>
					<?php foreach ($customerList as $customer): ?>
						<option value="<?= $customer->id ?>"><?= $customer->lastname ?> <?= $customer->firstname ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="city">Ville</label>
				<input type="hidden" id="id_cities" name="id_cities" value=""/>
				<input id="city" name="city" class="typeahead form-control" type="text" value="">
			</div>
			<div class="form-group my-1">
				<label for="district">Secteur</label>
				<input type="text" id="district" name="district" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="street">Adresse</label>
				<input type="text" id="street" name="street" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="complement">Complément d'adresse</label>
				<input type="text" id="complement" name="complement" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="renovation">Rénovation ?</label>
				<select name="renovation" id="renovation" class="form-control">
					<option value="0">Non</option>
					<option value="1">Oui</option>
				</select>
			</div>
		</div>
		<div class="col-3">
			<div class="form-group my-1">
				<label for="estate_types">Type de bien</label>
				<select name="estate_types" id="estate_types" class="form-control">
					<option value="0" selected disabled>Veuillez choisir un type de bien</option>
					<?php foreach ($estateTypeList as $estateType): ?>
						<option value="<?= $estateType->id ?>"><?= $estateType->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="floor">Etage</label>
				<input type="text" id="floor" name="floor" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="build_date">Date de construction</label>
				<select name="build_date" id="build_date" class="form-control">
					<option value="0" selected disabled>Veuillez choisir une période</option>
					<?php foreach ($dates as $date): ?>
						<option value="<?= $date->id ?>"><?= $date->period ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="condominium">Mitoyen ?</label>
				<select name="condominium" id="condominium" class="form-control">
					<option value="0">Non</option>
					<option value="1">Oui</option>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="joint_ownership">Copropriété</label>
				<select name="joint_ownership" id="joint_ownership" class="form-control">
					<option value="0">Non</option>
					<option value="1">Oui</option>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="floor_number">Nombre d'étages</label>
				<input type="text" id="floor_number" name="floor_number" class="form-control" value="">
			</div>
		</div>
		<div class="col-3">
			<div class="form-group my-1">
				<label for="expositions">Exposition</label>
				<select name="expositions" id="expositions" class="form-control">
					<option value="0" selected disabled>Veuillez choisir une exposition</option>
					<?php foreach ($expositionsList as $exposition): ?>
						<option value="<?= $exposition->id ?>"><?= $exposition->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="size">Surface</label>
				<input type="text" id="size" name="size" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="carrez_size">Surface (Carrez)</label>
				<input type="text" id="carrez_size" name="carrez_size" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="rooms_numbers">Nombre de pièces</label>
				<input type="text" id="rooms_numbers" name="rooms_numbers" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="bedroom_numbers">Nombre de chambres</label>
				<input type="text" id="bedroom_numbers" name="bedroom_numbers" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="outside_conditions">Extérieur</label>
				<select name="outside_conditions" id="outside_conditions" class="form-control">
					<option value="0" selected disabled>Veuillez choisir une condition</option>
					<?php foreach ($outsideConditionList as $outsideCondition): ?>
						<option value="<?= $outsideCondition->id ?>"><?= $outsideCondition->name ?></option>
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
