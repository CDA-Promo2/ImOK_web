<h1 class="text-center"><?= $title ?></h1>
<hr>
<?php
	if($_POST){
		var_dump($_POST);
	}
?>
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
	<hr>
	<div class="row justify-content-center">
		<div class="col-3 border">
			<div class="form-group my-1">
				<button>Ajouter une pièce</button>
			</div>
		</div>
		<div class="col-8 border">
			<div class="row">
				<div class="col-6">
					<div class="form-group my-1">
						<label for="room_types">Type de pièce</label>
						<select name="room_types" id="room_types" class="form-control">
							<option value="0" selected disabled>Veuillez choisir un type de pièce</option>
							<?php foreach ($roomTypeList as $roomType): ?>
								<option value="<?= $roomType->id ?>"><?= $roomType->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group my-1">
						<label for="size">Surface</label>
						<input type="text" id="size" name="size" class="form-control" value="">
					</div>
					<div class="form-group my-1">
						<label for="carrez_size">Surface loi Carrez</label>
						<input type="text" id="carrez_size" name="carrez_size" class="form-control" value="">
					</div>
					<div class="form-group my-1">
						<label for="windows_types">Type de fenêtres</label>
						<select name="windows_types" id="windows_types" class="form-control">
							<option value="0" selected disabled>Veuillez choisir un type de vitrage</option>
							<?php foreach ($windowsTypeList as $windowsType): ?>
								<option value="<?= $windowsType->id ?>"><?= $windowsType->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group my-1">
						<label for="condition">Etat général</label>
						<select name="condition" id="condition" class="form-control">
							<option value="0" selected disabled>Veuillez choisir un conditions</option>
						</select>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group my-1">
						<label for="ground_coverings">Revêtement sol</label>
						<select name="ground_coverings" id="ground_coverings" class="form-control">
							<option value="0" selected disabled>Veuillez choisir un revêtement de sol</option>
							<?php foreach ($groundCoveringsList as $groundCovering): ?>
								<option value="<?= $groundCovering->id ?>"><?= $groundCovering->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group my-1">
						<label for="wall_coverings">Revêtement sol</label>
						<select name="wall_coverings" id="wall_coverings" class="form-control">
							<option value="0" selected disabled>Veuillez choisir un revêtement de sol</option>
							<?php foreach ($wallCoveringsList as $wallCovering): ?>
								<option value="<?= $wallCovering->id ?>"><?= $wallCovering->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row justify-content-center">
		<div class="col-3">
			<p class="text-center">CONSOMMATION</p>
			<div class="form-group my-1">
				<label for="heating_types">Type de chauffage</label>
				<select name="heating_types" id="heating_types" class="form-control">
					<option value="0" selected disabled>Veuillez choisir un type de chauffage</option>
					<?php foreach ($heatingTypesList as $heatingType): ?>
						<option value="<?= $heatingType->id ?>"><?= $heatingType->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="energy_consumption">Valeur de conso annuelle</label>
				<input type="text" id="energy_consumption" name="energy_consumption" class="form-control" value="">
			</div>
			<div class="form-group my-1">
				<label for="gas_emission">Valeur gaz à effet de serre</label>
				<input type="text" id="gas_emission" name="gas_emission" class="form-control" value="">
			</div>
			<p>Classe énergétique :</p>
			<p>Classe GES :</p>
		</div>
		<div class="col-6">
			<p class="text-center">CHARGES</p>
			<div class="row">
				<div class="col-6">
					<div class="form-group my-1">
						<label for="condominium_fees">Charge de copropriété</label>
						<input type="text" id="condominium_fees" name="condominium_fees" class="form-control" value="">
					</div>
					<div class="form-group my-1">
						<label for="annual_fees">Charge annuelle</label>
						<input type="text" id="annual_fees" name="annual_fees" class="form-control" value="">
					</div>
					<div class="form-group my-1">
						<label for="housing_tax">Taxe d'habitation</label>
						<input type="text" id="housing_tax" name="housing_tax" class="form-control" value="">
					</div>
					<div class="form-group my-1">
						<label for="property_tax">Taxe foncière</label>
						<input type="text" id="property_tax" name="property_tax" class="form-control" value="">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group my-1">
						<label for="condominium_fees">Loyer mensuel</label>
						<input type="text" id="condominium_fees" name="condominium_fees" class="form-control" value="">
					</div>
					<div class="form-group my-1">
						<label for="price">Prix de vente</label>
						<input type="text" id="price" name="price" class="form-control" value="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row justify-content-center">
		<div class="col-6">
			<label for="estate_pic">PHOTOS</label>
			<div class="form-group my-1">
				<input type="file" id="estate_pic" name="estate_pic" class="form-control" value="">
			</div>
		</div>
		<div class="col-6">
			<div class="form-group my-1">
				<label for="description">DESCRIPTION</label>
				<textarea class="form-control w-75" name="description" id="description" cols="30" rows="5"></textarea>
			</div>
			<div class="form-group my-1">
				<label for="description">A PROXIMITE</label>
			</div>
		</div>
	</div>
	<div class="row justify-content-around my-5">
		<a href="<?= site_url().'/estate' ?>" class="btn btn-secondary col-4">Retour</a>
		<input type="submit" class="form-control btn btn-success col-4" name="createEstate">
	</div>
	<?php form_close() ?>
</div>
