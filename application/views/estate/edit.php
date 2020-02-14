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
						<option value="<?= $customer->id ?>" <?= isset($estate) && $estate->id == $customer->id ? 'selected' : '' ?> ><?= $customer->lastname ?> <?= $customer->firstname ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="city">Ville</label> <span class="error">* <?= form_error('id_cities') ?></span>
				<input type="hidden" id="id_cities" name="id_cities" value="<?= $cityInfo->id ?? ''?>"/>
				<input id="city" name="city" class="typeahead form-control" type="text" value="<?= $cityInfo->id ? $cityInfo->name . ' (' . $cityInfo->zip_code . ') ' : '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="district">Secteur</label> <?= form_error('district') ?>
				<input type="text" id="district" name="district" class="form-control" value="<?= $estate->district ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="street">Adresse</label> <span class="error">* <?= form_error('street') ?></span>
				<input type="text" id="street" name="street" class="form-control" value="<?= $estate->street ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="complement">Complément d'adresse</label> <?= form_error('complement') ?>
				<input type="text" id="complement" name="complement" class="form-control" value="<?= $estate->complement ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="renovation">Rénovation ?</label> <span class="error">* <?= form_error('renovation') ?> </span>
				<select name="renovation" id="renovation" class="form-control">
					<option value="" selected >---</option>
					<option value="0" <?= isset($estate->renovation) && $estate->renovation === 0 ? 'selected' : '' ?>>Non</option>
					<option value="1" <?= isset($estate->renovation) && $estate->renovation  == 1 ? 'selected' : '' ?>>Oui</option>
				</select>
			</div>
		</div>
		<div class="col">
			<div class="form-group my-1">
				<label for="id_estate_types">Type de bien</label> <span class="error">* <?= form_error('id_estate_types') ?></span>
				<select name="id_estate_types" id="id_estate_types" class="form-control">
					<option value="" selected>Veuillez choisir un type de bien</option>
					<?php foreach ($estateTypeList as $estateType): ?>
						<option value="<?= $estateType->id ?>" <?= isset($estate->id_estate_types) && $estate->id_estate_types == $estateType->id ? 'selected' : '' ?>><?= $estateType->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="floor">Etage</label> <span class="error">* <?= form_error('floor') ?></span>
				<input type="text" id="floor" name="floor" class="form-control" value="<?= $estate->floor ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="id_build_dates">Date de construction</label> <span class="error">* <?= form_error('id_build_dates') ?></span>
				<select name="id_build_dates" id="id_build_dates" class="form-control">
					<option value="" selected >---</option>
					<?php foreach ($dates as $date): ?>
						<option value="<?= $date->id ?>" <?= isset($estate->id_build_dates) && $estate->id_build_dates == $date->id ? 'selected' : '' ?>><?= $date->period ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="condominium">Mitoyen ?</label> <span class="error">* <?= form_error('condominium') ?></span>
				<select name="condominium" id="condominium" class="form-control">
					<option value=""  selected >---</option>
					<option value="0" <?= isset($estate->condominium) && $estate->condominium === 0 ? 'selected' : '' ?>>Non</option>
					<option value="1" <?= isset($estate->condominium) && $estate->condominium == 1 ? 'selected' : '' ?>>Oui</option>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="joint_ownership">Copropriété</label> <span class="error">* <?= form_error('joint_ownership') ?></span>
				<select name="joint_ownership" id="joint_ownership" class="form-control">
					<option value=""  selected >---</option>
					<option value="0" <?= isset($estate->joint_ownership) && $estate->joint_ownership === 0 ? 'selected' : '' ?>>Non</option>
					<option value="1" <?= isset($estate->joint_ownership) && $estate->joint_ownership == 1 ? 'selected' : '' ?>>Oui</option>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="floor_number">Nombre d'étages</label> <span class="error">* <?= form_error('floor_number') ?></span>
				<input type="text" id="floor_number" name="floor_number" class="form-control" value="<?= $estate->floor_number ?? '' ?>">
			</div>
		</div>
		<div class="col">
			<div class="form-group my-1">
				<label for="id_expositions">Exposition</label> <span class="error">* <?= form_error('id_expositions') ?></span>
				<select name="id_expositions" id="expositions" class="form-control">
					<option value="" selected >Veuillez choisir une exposition</option>
					<?php foreach ($expositionsList as $exposition): ?>
						<option value="<?= $exposition->id ?>" <?= isset($estate->id_expositions) && $estate->id_expositions == $exposition->id ? 'selected' : '' ?>><?= $exposition->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group my-1">
				<label for="size">Surface (en m²)</label> <span class="error">* <?= form_error('size') ?></span>
				<input type="text" id="size" name="size" class="form-control" value="<?= $estate->size ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="carrez_size">Surface Carrez (en m²)</label> <span class="error">* <?= form_error('carrez_size') ?></span>
				<input type="text" id="carrez_size" name="carrez_size" class="form-control" value="<?= $estate->carrez_size ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="rooms_numbers">Nombre de pièces</label> <span class="error">* <?= form_error('rooms_numbers') ?></span>
				<input type="text" id="rooms_numbers" name="rooms_numbers" class="form-control" value="<?= $estate->rooms_numbers ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="bedroom_numbers">Nombre de chambres</label> <span class="error">* <?= form_error('bedroom_numbers') ?></span>
				<input type="text" id="bedroom_numbers" name="bedroom_numbers" class="form-control" value="<?= $estate->bedroom_numbers ?? '' ?>">
			</div>
			<div class="form-group my-1">
				<label for="id_outside_conditions">Extérieur</label> <span class="error">* <?= form_error('id_outside_conditions') ?></span>
				<select name="id_outside_conditions" id="outside_conditions" class="form-control">
					<option value="" selected >Veuillez choisir une condition</option>
					<?php foreach ($outsideConditionList as $outsideCondition): ?>
						<option value="<?= $outsideCondition->id ?>" <?= isset($estate->id_outside_conditions) && $estate->id_outside_conditions == $outsideCondition->id ? 'selected' : '' ?>><?= $outsideCondition->name ?></option>
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
		<div class="col-9 border">
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
						<label for="size">Surface (en m²)</label>
						<input type="text" id="size" name="size" class="form-control" value="">
					</div>
					<div class="form-group my-1">
						<label for="carrez_size">Surface Carrez (en m²)</label>
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
		<div class="col-4">
			<p class="text-center">CONSOMMATION</p>
			<div class="form-group my-1">
				<label for="id_heating_types">Type de chauffage</label>
				<select name="id_heating_types" id="id_heating_types" class="form-control">
					<option value="0" selected disabled>Veuillez choisir un type de chauffage</option>
					<?php foreach ($heatingTypesList as $heatingType): ?>
						<option value="<?= $heatingType->id ?>"><?= $heatingType->name ?></option>
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
		<div class="col-7">
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
				<input type="file" id="estate_pic" name="estate_pic[]" class="form-control" multiple="">
<!--				<div class="preview"></div>-->
				<img id="imgPreview" src="" height="56" alt="Image preview...">
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
