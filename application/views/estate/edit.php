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
				<select name="owner" id="owner" class="form-control">
					<option value="0" selected disabled>---</option>
					<?php foreach ($customerList as $customer): ?>
						<option value="<?= $customer->id ?>" <?= $estate->id == $customer->id ? 'selected' : '' ?>><?= $customer->lastname ?> <?= $customer->firstname ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="city">Ville</label>
				<input type="hidden" id="id_cities" name="id_cities" value=""/>
					<input id="city" name="city" class="typeahead form-control" type="text" value="<?= $estate->city ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="district">Secteur</label>
				<input type="text" id="district" name="district" class="form-control" value="<?= $estate->id_districts ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="street">Adresse</label>
				<input type="text" id="street" name="street" class="form-control" value="<?= $estate->street ?? '' ?>">
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
						<option value="<?= $estateType->id ?>" <?= $estate->id == $estateType->id ? 'selected' : '' ?>><?= $estateType->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="floor">Etage</label>
				<input type="text" id="floor" name="floor" class="form-control" value="<?= $estate->floor ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="build_date">Date de construction</label>
				<select name="build_date" id="build_date" class="form-control">
					<option value="0" selected disabled>Veuillez choisir une période</option>
					<?php foreach ($dates as $date): ?>
						<option value="<?= $date->id ?>" <?= $estate->id == $date->id ? 'selected' : '' ?>><?= $date->period ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="condominium">Mitoyen ?</label>
				<select name="condominium" id="condominium" class="form-control">
					<option value="0" <?= $estate->id == 0 ? 'selected' : '' ?>>Non</option>
					<option value="1" <?= $estate->id == 1 ? 'selected' : '' ?>>Oui</option>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="joint_ownership">Copropriété</label>
				<select name="joint_ownership" id="joint_ownership" class="form-control">
					<option value="0" <?= $estate->id == 0 ? 'selected' : '' ?>>Non</option>
					<option value="1" <?= $estate->id == 1 ? 'selected' : '' ?>>Oui</option>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="floor_number">Nombre d'étages</label>
				<input type="text" id="floor_number" name="floor_number" class="form-control" value="<?= $estate->floor_number ?? '' ?>">
			</div>
		</div>
		<div class="col-3">
			<div class="form-group my-1">
				<label for="expositions">Exposition</label>
				<select name="expositions" id="expositions" class="form-control">
					<option value="0" selected disabled>Veuillez choisir une exposition</option>
					<?php foreach ($expositionsList as $exposition): ?>
						<option value="<?= $exposition->id ?>" <?= $estate->id == $exposition->id ? 'selected' : '' ?>><?= $exposition->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="size">Surface</label>
				<input type="text" id="size" name="size" class="form-control" value="<?= $estate->size ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="carrez_size">Surface (Carrez)</label>
				<input type="text" id="carrez_size" name="carrez_size" class="form-control" value="<?= $estate->carrez_size ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="rooms_numbers">Nombre de pièces</label>
				<input type="text" id="rooms_numbers" name="rooms_numbers" class="form-control" value="<?= $estate->rooms_numbers ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="bedroom_numbers">Nombre de chambres</label>
				<input type="text" id="bedroom_numbers" name="bedroom_numbers" class="form-control" value="<?= $estate->bedroom_numbers ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="outside_conditions">Extérieur</label>
				<select name="outside_conditions" id="outside_conditions" class="form-control">
					<option value="0" selected disabled>Veuillez choisir une condition</option>
					<?php foreach ($outsideConditionList as $outsideCondition): ?>
						<option value="<?= $outsideCondition->id ?>" <?= $estate->id == $outsideCondition->id ? 'selected' : '' ?>><?= $outsideCondition->name ?></option>
					<?php endforeach; ?>
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
								<option value="<?= $roomType->id ?>" <?= $estate->id == $roomType->id ? 'selected' : '' ?>><?= $roomType->name ?></option>
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
								<option value="<?= $windowsType->id ?>" <?= $estate->id == $windowsType->id ? 'selected' : '' ?>><?= $windowsType->name ?></option>
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
								<option value="<?= $groundCovering->id ?>" <?= $estate->id == $groundCovering->id ? 'selected' : '' ?>><?= $groundCovering->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group my-1">
						<label for="wall_coverings">Revêtement sol</label>
						<select name="wall_coverings" id="wall_coverings" class="form-control">
							<option value="0" selected disabled>Veuillez choisir un revêtement de sol</option>
							<?php foreach ($wallCoveringsList as $wallCovering): ?>
								<option value="<?= $wallCovering->id ?>" <?= $estate->id == $wallCovering->id ? 'selected' : '' ?>><?= $wallCovering->name ?></option>
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
						<option value="<?= $heatingType->id ?>" <?= $estate->id == $heatingType->id ? 'selected' : '' ?>><?= $heatingType->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="energy_consumption">Valeur de conso annuelle</label>
				<input type="text" id="energy_consumption" name="energy_consumption" class="form-control" value="<?= $estate->energy_consumption ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="gas_emission">Valeur gaz à effet de serre</label>
				<input type="text" id="gas_emission" name="gas_emission" class="form-control" value="<?= $estate->gas_emission ?? '' ?>">
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
						<input type="text" id="condominium_fees" name="condominium_fees" class="form-control" value="<?= $estate->condominium_fees ?? '' ?>">
					</div>
					<div class="form-group my-1">
						<label for="annual_fees">Charge annuelle</label>
						<input type="text" id="annual_fees" name="annual_fees" class="form-control" value="<?= $estate->annual_fees ?? '' ?>">
					</div>
					<div class="form-group my-1">
						<label for="price">Prix de vente</label>
						<input type="text" id="price" name="price" class="form-control" value="<?= $estate->price ?? '' ?>">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group my-1">
						<label for="housing_tax">Taxe d'habitation</label>
						<input type="text" id="housing_tax" name="housing_tax" class="form-control" value="<?= $estate->housing_tax ?? '' ?>">
					</div>
					<div class="form-group my-1">
						<label for="property_tax">Taxe foncière</label>
						<input type="text" id="property_tax" name="property_tax" class="form-control" value="<?= $estate->property_tax ?? '' ?>">
					</div>
					<div class="form-group my-1">
						<label for="rent">Loyer mensuel</label>
						<input type="text" id="rent" name="rent" class="form-control" value="<?= $estate->rent ?? '' ?>">
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
				<input type="file" id="image" name="image" class="form-control" multiple="">
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
