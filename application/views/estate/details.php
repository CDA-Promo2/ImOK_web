<?php

$sizes  = $estate->size;
$size = explode(".", $sizes);

$prices  = $estate->price;
$price = explode(".", $prices);

$carrez_sizes = $estate->carrez_size;
$carrez_size = explode(".", $carrez_sizes);

?>


<div class="background"></div>
<div class="background-filter"></div>

<div class="container">
	<?= $breadcrumb ?? '<div class="my-5">breadcrumbs</div>' ?>
</div>

<div class="container bg-white px-2 py-1 shadow">

	<div class="row justify-content-center my-4">
		<div class="col-12">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
						<img class="d-block w-100" src="https://picsum.photos/id/42/800/450" alt="First slide">
						</div>
						<div class="carousel-item">
						<img class="d-block w-100" src="https://picsum.photos/id/43/800/450" alt="Second slide">
						</div>
						<div class="carousel-item">
						<img class="d-block w-100" src="https://picsum.photos/id/44/800/450" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
					</div>
				</div>
				<div class="col-10 h4 my-2">
					<h3>
						<?= $estate->estate_type ? $estate->estate_type : '' ?>
						<?= $size[0] ? ' de '.$size[0].' m²' : '' ?>
						<?= $estate->rooms_numbers ? ' - '.$estate->rooms_numbers.' pièces' : '' ?>
						<strong><?= $estate->city ? 'à '.$estate->city : '' ?></strong>
					</h3>
				</div>
				<div class="col-2 h4 my-2 shadow text-center bg-danger text-white">
					<p><strong class="center-vertical"><?= $price[0] ?? 'NC' ?> €</strong></p>
				</div>
			</div>
		
						
	<div class="row">
		<div class="col-8">
			<p class="h4">
				<i class="fas fa-map-marker-alt text-info"></i>
				<?= $estate->street ?? 'nc' ?>
				<?= $estate->complement ? ', '.$estate->complement : ''?>
				<?= $estate->zip_code ? '<br>'.$estate->zip_code : ''?>
				<?= $estate->city ? ' '.$estate->city : ''?>

			</p>
			<p class="mt-3"><?= $estate->description ?? 'Aucune description renseignée...' ?></p>
		</div>
		<div class="col-4">
			<h3 class="text-bold h6 text-uppercase">Collaborateur en charge du bien</h3>
			<div class="cbox">
				<p class="my-3 bold h5 text-uppercase">Felix Romain</p>
				<p class="text-danger"><a href="tel:0646715313"><span class="btn btn-outline-danger rounded-circle bg-white"><i class="fas fa-phone"></i></span></a> Appeler</p>
				<p class="text-danger"><a href="mailto:felix.romain@hotmail.fr"><span class="btn btn-outline-danger rounded-circle bg-white"><i class="fas fa-envelope"></i></span></a> Envoyer un mail</p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-8">
		<div class="row my-3">
		<div class="col-6">
			<div class="mt-5">
				<b>GENERAL</b>
				<table class="table">
					<tr>
						<td>Prix :</td>
						<td><?= $price[0] ? $price[0].' €' : 'NC' ?></td>
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
			<div class="mt-5">
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
			<div class="mt-5">
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
		</div>
		<div class="col-6">
			<div class="mt-5">
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
			<div class="mt-5">
				<b>CARACTERISTIQUE</b>
				<table class="table">
					<tr>
						<td>Surface :</td>
						<td><?= $size[0] ? $size[0].' m²' : 'NC' ?></td>
					</tr>
					<tr>
						<td>Surface Carrez :</td>
						<td><?= $carrez_size[0] ? $carrez_size[0].' m2' : 'NC' ?></td>
					</tr>
					<tr>
						<td>Condition Exterieur :</td>
						<td><?= $estate->outside_condition ?? 'NC' ?></td>
					</tr>
					<tr>
						<td>Rénovation à prévoir :</td>
						<td><?= $estate->renovation ?? 'NC' ?></td>
					</tr>
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
		<div class="col-4 my-5">
			<h3 class="text-bold h6 text-uppercase">Propiétaire du bien</h3>
				<div class="cbox">
					<p class="my-3 bold h5 text-uppercase"><?= $estate->owner_lastname .' '. $estate->owner_firsname ?></p>
					<p class="text-danger"><a href="tel:0722158736"><span class="btn btn-outline-danger rounded-circle bg-white"><i class="fas fa-phone"></i></span></a> Appeler</p>
					<p class="text-danger"><a href="mailto:se.hinard@gmail.com"><span class="btn btn-outline-danger rounded-circle bg-white"><i class="fas fa-envelope"></i></span></a> Envoyer un mail</p>
				</div>
				<div class="mt-5">
					<a href="../edit/<?= $estate->id ?>" class="d-block btn btn-info">
						<i class="fa fa-pen"></i>
						Mettre à jour le bien
					</a>
				</div>
			</div>
		</div>
		</div>
	</div>

























