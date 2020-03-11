<div class="background"></div>
<div class="background-filter"></div>

<div class="container">

	<?= $breadcrumb ?? '<div class="my-5">breadcrumbs</div>' ?>

	<div class="bg-white shadow">
	<?= form_open_multipart(); ?>
		<!-- formulaire premiere partie -->
		<div class="tab card" id="tab-1">
			<div class="card-header text-center clearfix">
				<button type="button" data-parent="#tab-1" data-target="#tab-2" class="previous btn btn-secondary float-right">Suivant</button>
				<h2>Enregistrer un bien (1/4)</h2>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<h3>Informations générales</h3>
					</div>
					<div class="col-md-6">
						<div class="form-group required">
							<label for="id_customers">Propriétaire</label><?= form_error('id_customers') ?>
							<select type="text" name="id_customers" id="id_customers" class="form-control">
								<option selected disabled>Choisissez un client</option>
								<?php foreach ($customerList as $customer): ?>
									<option value="<?= $customer->id ?>" <?= isset($_POST['id_customers']) && $_POST['id_customers'] == $customer->id ? 'selected' : '' ?> ><?= $customer->lastname ?> <?= $customer->firstname ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group required">
							<label for="id_estate_types">Type de bien</label><?= form_error('id_estate_types') ?>
							<select type="text" name="id_estate_types" id="id_estate_types" class="form-control">
								<option selected disabled>Choisissez un type de bien</option>
								<?php foreach ($estateTypeList as $estateType): ?>
									<option value="<?= $estateType->id ?>" <?= isset($_POST['id_estate_types']) && $_POST['id_estate_types'] == $estateType->id ? 'selected' : '' ?>><?= $estateType->name ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<h3>Addresse</h3>
						<div class="row">
							<div class="col-12">
								<div class="form-group required">
									<label for="street">Addresse</label><?= form_error('street') ?>
									<input type="text" name="street" id="street" class="form-control" value="<?= $_POST['street'] ?? '' ?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="complement">Complément d'addresse</label><?= form_error('complement') ?>
									<input type="text" name="complement" id="complement" class="form-control" value="<?= $_POST['complement'] ?? '' ?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group required">
									<label for="city">Ville</label><?= form_error('id_cities') ?>
									<input type="hidden" id="id_cities" name="id_cities" value="<?= $_POST['id_cities'] ?? '' ?>" style="height: 20px;">
									<input id="city" name="city" class="typeahead form-control" type="text" value="<?= $_POST['city'] ?? '' ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h3>Informations générales</h3>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="size">Surface (en m²)</label><?= form_error('size') ?>
									<input type="text" id="size" name="size" class="form-control" value="<?= $_POST['size'] ?? '' ?>">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="carrez_size">Surface Carrez (en m²)</label><?= form_error('carrez_size') ?>
									<input type="text" id="carrez_size" name="carrez_size" class="form-control" value="<?= $_POST['carrez_size'] ?? '' ?>">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="rooms_numbers">Nb de pièces</label><?= form_error('rooms_numbers') ?>
									<input type="text" id="rooms_numbers" name="rooms_numbers" class="form-control" value="<?= $_POST['rooms_numbers'] ?? '' ?>">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="bedroom_numbers">Nb de chambres</label><?= form_error('bedrooms_numbers') ?>
									<input type="text" id="bedroom_numbers" name="bedroom_numbers" class="form-control" value="<?= $_POST['bedroom_numbers'] ?? '' ?>">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="floor">Quel étage ?</label><?= form_error('floor') ?>
									<input type="text" id="floor" name="floor" class="form-control" value="<?= $_POST['floor'] ?? '' ?>">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="floor_number">Nb d'étages</label><?= form_error('floor_number') ?>
									<input type="text" id="floor_number" name="floor_number" class="form-control" value="<?= $_POST['floor_number'] ?? '' ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<h3>Informations complémentaires</h3>
					</div>
					<div class="col-12">
						<div class="d-flex justify-content-start">
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="joint_ownership" name="joint_ownership" value="1"<?= isset($_POST['joint_ownership'] ) && $_POST['joint_ownership'] ? 'checked' : '' ?>>
									<label class="custom-control-label" for="joint_ownership">Copropriété</label>
								</div>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="condominium" name="condominium" value="1"<?= isset($_POST['condominium']) && $_POST['condominium'] ? 'checked' : '' ?>>
									<label class="custom-control-label" for="condominium">Mitoyenneté</label>
								</div>
								<div class="custom-control custom-checkbox mr-3">
									<input type="checkbox" class="custom-control-input" id="renovation" name="renovation" value="1"<?= isset($_POST['renovations']) && $_POST['renovation'] ? 'checked' : '' ?>>
									<label class="custom-control-label" for="renovation">Rénnovations à prévoir</label>
								</div>
						</div>
						<?= form_error('joint_ownership') ?>
						<?= form_error('condominium') ?>
						<?= form_error('renovation') ?>
					</div>
					<div class="col-md-6 mt-3">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="id_outside_conditions">Etat extérieur</label><?= form_error('id_outside_conditions') ?>
									<select type="text" name="id_outside_conditions" id="id_outside_conditions" class="form-control">
										<option selected disabled>Choisir un état général</option>
										<?php foreach ($outsideConditionList as $outsideCondition): ?>
											<option value="<?= $outsideCondition->id ?>" <?= isset($_POST['id_outside_conditions']) && $_POST['id_outside_conditions'] == $outsideCondition->id ? 'selected' : '' ?>><?= $outsideCondition->name ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="id_expositions">Exposition</label><?= form_error('id_expositions') ?>
									<select type="text" name="id_expositions" id="id_expositions" class="form-control">
										<option selected disabled>Choisir une exposition</option>
										<?php foreach ($expositionsList as $exposition): ?>
											<option value="<?= $exposition->id ?>" <?= isset($_POST['id_expositions']) && $_POST['id_expositions'] == $exposition->id ? 'selected' : '' ?>><?= $exposition->name ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 mt-3">
						<div class="form-group">
							<label for="description">Description</label><?= form_error('description') ?>
							<textarea name="description" id="description" class="form-control trumbowyg"><?= $_POST['description'] ?? '' ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- formulaire deuxième partie -->
		<div class="card tab" id="tab-2">
			<div class="card-header text-center clearfix">
				<button type="button" data-target="#tab-1" class="next btn btn-secondary float-left">Précédent</button>
				<button type="button" data-target="#tab-3" class="previous btn btn-secondary float-right">Suivant</button>
				<h2>Enregistrer un bien (2/4)</h2>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<h3>Pièces</h3>
					</div>
					<div class="col-md-6">
						<input type="hidden" name="room_array" id="room_array" value="">
						<input type="hidden" name="room_string" id="room_string" value="">
						<div class="h-100 border p-3" id="room_list"></div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-12">
								<input type="hidden" id="room_id" value="">
								<div class="form-group">
									<label for="room_types">Type de pièce</label><?= form_error('room_types') ?>
									<select type="text" class="form-control" name="room_types" id="room_types">
										<option selected disabled>Selectionnez un type de pièce</option>
										<?php foreach ($roomTypeList as $roomType): ?>
											<option value="<?= $roomType->name ?>" <?= isset($_POST['room_types']) && $_POST['room_types'] == $roomType->id ? 'selected' : '' ?>><?= $roomType->name ?></option>
<!--											<option value="--><?//= $roomType->id ?><!--" --><?//= isset($_POST['room_types']) && $_POST['room_types'] == $roomType->id ? 'selected' : '' ?><!-->--><?//= $roomType->name ?><!--</option>-->
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="room_size">Surface (en m²)</label><?= form_error('room_size') ?>
									<input type="text" class="form-control" name="room_size" id="room_size">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="room_carrezSize">Surface Carrez (en m²)</label><?= form_error('room_carrezSize') ?>
									<input type="text" class="form-control" name="room_carrezSize" id="room_carrezSize">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="windows_types">Type de fenêtre</label><?= form_error('windows_types') ?>
									<select type="text" class="form-control" name="windows_types" id="windows_types">
										<option selected disabled>Selectionnez un type de fenètres</option>
										<?php foreach ($windowsTypeList as $windowsType): ?>
											<option value="<?= $windowsType->name ?>" <?= isset($_POST['windows_types']) && $_POST['windows_types'] == $windowsType->id ? 'selected' : '' ?>><?= $windowsType->name ?></option>
<!--											<option value="--><?//= $windowsType->id ?><!--" --><?//= isset($_POST['windows_types']) && $_POST['windows_types'] == $windowsType->id ? 'selected' : '' ?><!-->--><?//= $windowsType->name ?><!--</option>-->
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="wall_coverings">Revêtement mural</label><?= form_error('wall_coverings') ?>
									<select type="text" class="form-control" name="wall_coverings" id="wall_coverings">
										<option selected disabled>Selectionnez un revêtement</option>
										<?php foreach ($wallCoveringsList as $wallCovering): ?>
											<option value="<?= $wallCovering->name ?>" <?= isset($_POST['wall_coverings']) && $_POST['wall_coverings'] == $wallCovering->id ? 'selected' : '' ?>><?= $wallCovering->name ?></option>
<!--											<option value="--><?//= $wallCovering->id ?><!--" --><?//= isset($_POST['wall_coverings']) && $_POST['wall_coverings'] == $wallCovering->id ? 'selected' : '' ?><!-->--><?//= $wallCovering->name ?><!--</option>-->
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="ground_coverings">Revêtement au sol</label><?= form_error('ground_coverings') ?>
									<select type="text" class="form-control" name="ground_coverings" id="ground_coverings">
										<option selected disabled>Selectionnez un revêtement</option>
										<?php foreach ($groundCoveringsList as $groundCovering): ?>
											<option value="<?= $groundCovering->name ?>" <?= isset($_POST['ground_coverings']) && $_POST['ground_coverings'] == $groundCovering->id ? 'selected' : '' ?>><?= $groundCovering->name ?></option>
<!--											<option value="--><?//= $groundCovering->id ?><!--" --><?//= isset($_POST['ground_coverings']) && $_POST['ground_coverings'] == $groundCovering->id ? 'selected' : '' ?><!-->--><?//= $groundCovering->name ?><!--</option>-->
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-12">
								<button id="add_room" type="button" class="w-100 btn btn-primary d-block">
									<i class="fa fa-pen"></i>
									Ajouter une pièce
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- formulaire troisième partie -->
		<div class="card tab" id="tab-3">
			<div class="card-header text-center clearfix">
				<button type="button" data-target="#tab-2" class="next btn btn-secondary float-left">Précédent</button>
				<button type="button" data-target="#tab-4" class="previous btn btn-secondary float-right">Suivant</button>
				<h2>Enregistrer un bien (3/4)</h2>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="form-group">
							<h3 class="text-center">Prix de vente</h3><?= form_error('price') ?>
							<input type="text" name="price" id="price" class="form-control" value="<?= $_POST['price'] ?? ''?>">
						</div>
					</div>
					<div class="col-12">
						<hr>
					</div>
					<div class="col-md-6">
						<h3>Charges</h3>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="property_tax">Taxe foncière</label> <?= form_error('property_tax') ?>
									<input type="text" class="form-control" name="property_tax" id="property_tax" value="<?= $_POST['property_tax'] ?? ''?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="housing_tax">Taxe d'habitation</label> <?= form_error('housing_tax') ?>
									<input type="text" class="form-control" name="housing_tax" id="housing_tax" value="<?= $_POST['housing_tax'] ?? ''?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="condominium_fees">Charges de copropriétés</label> <?= form_error('condominium_fees') ?>
									<input type="text" class="form-control" name="condominium_fees" id="condominium_fees" value="<?= $_POST['condominium_fees'] ?? ''?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="annual_fees">Charges annuelles</label> <?= form_error('annual_fees') ?>
									<input type="text" class="form-control" name="annual_fees" id="annual_fees" value="<?=$_POST['annual_fees'] ?? ''?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h3>Consommation</h3>
						<div class="col-12">
							<div class="form-group">
								<label for="id_heating_types">Type de chauffage</label> <?= form_error('id_heating_types') ?>
								<select type="text" class="form-control" name="id_heating_types" id="id_heating_types">
									<option selected disabled>Selectionnez un revêtement</option>
									<?php foreach ($heatingTypesList as $heatingTypes): ?>
										<option value="<?= $heatingTypes->id ?>" <?= isset($_POST['id_heating_types']) && $_POST['id_heating_types'] == $heatingTypes->id ? 'selected' : '' ?>><?= $heatingTypes->name ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="">Consommation énergétique</label> <?= form_error('energy_consumption') ?>
								<input type="text" class="form-control" name="energy_consumption" id="energy_consumption" placeholder="en kWhEP / m&sup2; /an" value="<?=$_POST['energy_consumption'] ?? ''?>">
							</div>
						</div>
						<div class="col-12">
							<ul class="energyScale">
								<li>A</li>
								<li>B</li>
								<li>C</li>
								<li>D</li>
								<li>E</li>
								<li>F</li>
								<li>G</li>
								<li class="selected">H</li>
							</ul>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="">Emission de CO2</label> <?= form_error('gas_emission') ?>
								<input type="text" class="form-control" id="gas_emission" name="gas_emission" placeholder="en kg CO2 / m&sup2; /an" value="<?=$_POST['gas_emission'] ?? ''?>">
							</div>
						</div>
						<div class="col-12">
							<ul class="gasScale">
								<li>A</li>
								<li>B</li>
								<li>C</li>
								<li>D</li>
								<li>E</li>
								<li>F</li>
								<li>G</li>
								<li class="selected">H</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- formulaire quatrième partie -->
		<div class="card tab" id="tab-4">
			<div class="card-header text-center clearfix">
				<button type="button" data-target="#tab-3" class="next btn btn-secondary float-left">Précédent</button>
				<h2>Enregistrer un bien (4/4)</h2>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-12">
								<h3>Photos</h3>
							</div>
							<div class="col-12 p-4">
								<div class="border row" id="image-preview">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="image-upload">Charger les images</label>
									<input type="file" name="image-upload[]" multiple="" id="image-upload" class="form-control">
									<input type="text" id="images" hidden>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-12">
								<h3>A proximité</h3>
							</div>
							<div class="col-12 p-4">
								<input type="hidden" name="facilities_array" id="facilities_array" value="">
								<div class="border" id="facilities-list">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="">Ajouter un élément</label>
									<select id="facilities-select" class="custom-select" name="facilities-select">
										<option selected disabled>Ajouter un élément</option>
										<?php foreach ($facilitiesList as $facility): ?>
											<option value="<?= $facility->id ?>"><?= $facility->name ?></option>
										<?php endforeach; ?>
									</select>
									<input type="text" name="facilities" hidden id="falicities">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer clearfix">
			<button type="submit" class="btn btn-success float-right mt-3">Enregistrer le bien</button>
		</div>
	<?php form_close() ?>
	</div>
</div>
