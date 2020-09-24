<div class="background"></div>
<div class="background-filter"></div>

<div class="container">
	<?= $breadcrumb ?? '<div class="my-5">breadcrumbs</div>' ?>
</div>

<div class="container bg-white px-2 py-1 shadow">
	<div class="row justify-content-center my-4">

		<!-- PARTIE GAUCHE -->
		<div class="col-lg-8">
			<div class="row">
				<!-- CAROUSEL -->
				<div class="col-12 mb-2">
					<?php if (!empty($imageList)): ?>
						<div id="estateImageCarousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php foreach ($imageList as $key => $image): ?>
									<div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
										<img class="d-block carousel-image" src="<?= base_url('upload/img/estate/'. $id . '/' . $image) ?>" alt="First slide">
									</div>
								<?php endforeach; ?>
							</div>
							<a class="carousel-control-prev" href="#estateImageCarousel" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#estateImageCarousel" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					<?php else : ?>
						<img class="carousel-image" src="<?= base_url('upload/img/estate/no-image.png') ?>" alt="Pas d'image enregistré">
					<?php endif ?>
				</div>
				<div class="col-12 mb-2">
					<?php if($estate->price): ?>
						<div class="d-inline-block shadow text-center bg-danger text-white p-2 float-right">
							<strong><?= $estate->price ?> €</strong>
						</div>
					<?php else: ?>
						<div class="d-inline-block shadow text-center bg-secondary text-white p-2 float-right">
							Prix non renseigné
						</div>
					<?php endif ?>
					<p class="h4">
						<i class="fas fa-map-marker-alt text-info"></i>
						<?= $estate->street ?? 'nc' ?>
						<?= $estate->complement ? ', '.$estate->complement : ''?>
						<?= $estate->zip_code ? '<br>'.$estate->zip_code : ''?>
						<?= $estate->city ? ' '.$estate->city : ''?>
					</p>
					<p class="mt-3"><?= $estate->description ?? 'Aucune description renseignée...' ?></p>
				</div>
				<div class="col-12 mb-2">
					<div class="row">
						<div class="col-md-6">
							<b>GENERAL</b>
							<table class="table">
								<tr>
									<td>Prix :</td>
									<td><?= $estate->price ? $estate->price.' €' : 'NC' ?></td>
								</tr>
								<tr>
									<td>Type de bien :</td>
									<td><?= $estate->estate_type ?? 'NC' ?></td>
								</tr>
								<tr>
									<td>Nombre de pièces :</td>
									<td><?= $estate->rooms_numbers ?? 'NC' ?></td>
								</tr>
								<tr>
									<td>Nombre de chambre :</td>
									<td><?= $estate->bedrooms_numbers ?? 'NC' ?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<b>ENERGIE</b>
							<table class="table">
								<tr>
									<td>Conso annuelle :</td>
									<td><?= $estate->energy_consumption ? $estate->energy_consumption.' KWh/m2' : 'NC'?></td>
								</tr>
								<tr>
									<td>Gaz à effet de serre :</td>
									<td><?= $estate->gas_emission ? $estate->gas_emission.' CO2/m2/an' : 'NC'?></td>
								</tr>
								<tr>
									<td>Type de chauffage :</td>
									<td><?= $estate->heating_type ?? 'NC' ?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<b>LOCALISATION</b>
							<table class="table">
								<tr>
									<td>Ville :</td>
									<td><?= $estate->city ?? 'NC' ?></td>
								</tr>
								<tr>
									<td>Code postal :</td>
									<td><?= $estate->zip_code ?? 'NC' ?></td>
								</tr>
								<tr>
									<td>Adresse :</td>
									<td><?= $estate->street ?? 'NC' ?></td>
								</tr>
								<tr>
									<td>Exposition :</td>
									<td><?= $estate->exposition ?? 'NC' ?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<b>FINANCIER</b>
							<table class="table">
								<tr>
									<td>Charge copropriété :</td>
									<td><?= $estate->condominium_fees ? $estate->condominium_fees.' €' : 'NC'?></td>
								</tr>
								<tr>
									<td>Charge annuelle :</td>
									<td><?= $estate->annual_fees ? $estate->annual_fees.' €' : 'NC'?></td>
								</tr>
								<tr>
									<td>Taxe d'habitation :</td>
									<td><?= $estate->housing_tax ? $estate->housing_tax.' €' : 'NC'?></td>
								</tr>
								<tr>
									<td>Taxe foncière :</td>
									<td><?= $estate->property_tax ? $estate->property_tax.' €' : 'NC'?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<b>CARACTERISTIQUE</b>
							<table class="table">
								<tr>
									<td>Surface :</td>
									<td><?= $estate->size ? $estate->size.' m²' : 'NC' ?></td>
								</tr>
								<tr>
									<td>Surface Carrez :</td>
									<td><?= $estate->carrez_size ? $estate->carrez_size.' m2' : 'NC' ?></td>
								</tr>
								<tr>
									<td>Condition Exterieur :</td>
									<td><?= $estate->outside_condition ?? 'NC' ?></td>
								</tr>
								<tr>
									<td>Rénovation à prévoir :</td>
									<td><?= $estate->renovation ?? 'NC' ?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<table class="table mt-md-4">
								<tr>
									<td>Etage :</td>
									<td><?= $estate->floor ?? 'NC' ?></td>
								</tr>
								<tr>
									<td>Nombre d'étage :</td>
									<td><?= $estate->floor_number ?? 'NC' ?></td>
								</tr>
								<tr>
									<td>Date de construction :</td>
									<td><?= $estate->period ?? 'NC' ?></td>
								</tr>
								<tr>
									<td>Mitoyenneté :</td>
									<td><?= $estate->condominium ? 'oui' : 'non' ?></td>
								</tr>
								<tr>
									<td>Copropriété :</td>
									<td><?= $estate->joint_ownership ? 'oui' : 'non' ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- PARTIE DROITE -->
		<div class="col-lg-4">
			<div class="row">
				<div class="col-12 mb-2">
					<div id="map" style="height: 300px; width: auto;" data-map="[47,3,6]">
						<span class="marker focus" data-address="<?=$estate->street?>>" data-zipcode="<?=$estate->zip_code?>" hidden>
							<h4><?= $estate->id . ' - ' . ($estate->estate_type ? $estate->estate_type : 'Non renseigné') ?></h4>
							<img class="img-fluid w-100" src="https://picsum.photos/300/200?random=<?= mt_rand(1,20) ?>" alt="Card image cap">
							<a href="estate/details/<?= $estate->id ?>">Voir le bien</a>
						</span>
					</div>
				</div>
				<div class="col-12 mb-4">
				<a href="../edit/<?= $estate->id ?>" class="d-block btn btn-info">
					<i class="fa fa-pen"></i>
					Mettre à jour le bien
				</a>
				<a href="../edit/<?= $estate->id ?>" class="d-block btn btn-danger mt-1">
					<i class="fa fa-archive"></i>
					Arhiver
				</a>
				</div>
				<div class="col-12 mb-2">
					<h3 class="text-bold h6 text-uppercase">Collaborateur en charge du bien</h3>
					<div class="cbox">
						<p class="my-3 bold h5 text-uppercase">Felix Romain</p>
						<p class="text-danger"><a href="tel:0646715313"><span class="btn btn-outline-danger rounded-circle bg-white"><i class="fas fa-phone"></i></span></a> Appeler</p>
						<p class="text-danger"><a href="mailto:felix.romain@hotmail.fr"><span class="btn btn-outline-danger rounded-circle bg-white"><i class="fas fa-envelope"></i></span></a> Envoyer un mail</p>
					</div>
				</div>
				<div class="col-12 mb-2">
					<h3 class="text-bold h6 text-uppercase">Propiétaire du bien</h3>
					<div class="cbox">
						<p class="my-3 bold h5 text-uppercase"><?= $estate->owner_lastname .' '. $estate->owner_firsname ?></p>
						<p class="text-danger"><a href="tel:0722158736"><span class="btn btn-outline-danger rounded-circle bg-white"><i class="fas fa-phone"></i></span></a> Appeler</p>
						<p class="text-danger"><a href="mailto:se.hinard@gmail.com"><span class="btn btn-outline-danger rounded-circle bg-white"><i class="fas fa-envelope"></i></span></a> Envoyer un mail</p>
					</div>

				</div>

			</div>
		</div>
						



























