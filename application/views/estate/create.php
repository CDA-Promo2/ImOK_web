<h1 class="text-center"><?= $title ?></h1>
<hr>
<div class="container">
	<?= form_error() ?>
	<?= form_open_multipart(); ?>
	<div class="row justify-content-center">
		<div class="col-3">
			<div class="form-group my-1">
				<label for="owner">Propriétaire</label>
				<input type="text" id="owner" name="owner" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="city">Ville</label>
				<select name="city" id="city" class="form-control">
					<option value="0" selected disabled>Veuillez choisir une ville</option>
					<?php // foreach ($cities as $city): ?>
					<!--					<option value="--><?//= $city->id ?><!--">--><?//= $city->name ?><!--</option>-->
					<?php // endforeach; ?>
				</select>
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
				<label for="outside_conditions">Extérieur</label>
				<input type="text" id="outside_conditions" name="outside_conditions" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="terrace">Terrasse</label>
				<input type="text" id="terrace" name="terrace" class="form-control" value="">
			</div>
		</div>
		<div class="col-3">
			<div class="form-group my-1">
				<label for="estate_types">Type de bien</label>
				<input type="text" id="estate_types" name="estate_types" class="form-control" value="">
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
				<label for="floor_number">Nombre d'étages</label>
				<input type="text" id="floor_number" name="floor_number" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="elevator">Ascenseur</label>
				<select name="elevator" id="elevator" class="form-control">
					<option value="0">Non</option>
					<option value="1">Oui</option>
				</select>
			</div>
		</div>
		<div class="col-3">
			<div class="form-group my-1">
				<label for="parking">Parking / Garage :</label>
				<select name="parking" id="parking" class="form-control">
					<option value="0">Non</option>
					<option value="1">Oui</option>
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
				<label for="basement">Cave / Sous-sol</label>
				<select name="basement" id="basement" class="form-control">
					<option value="0">Non</option>
					<option value="1">Oui</option>
				</select>
			</div>
		</div>
	</div>
	<?php form_close() ?>
</div>
