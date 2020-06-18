<div class="background"></div>
<div class="background-filter"></div>

<div class="container">
	<?= $breadcrumb ?? '<div class="my-5">breadcrumb</div>' ?>
	<div class="row">
		<div class="col-8">
			<div class="row">
				<div class="col-12">
					<?php form_open() ?>
					<div class="input-group">
						<input type="text" name="search-estate" id="search-estate" class="form-control" placeholder="Recherche par ville / code postal ...">
						<div class="input-group-append">
							<button class="btn btn-info"><i class="fa fa-search"></i> Rechercher</button>
						</div>
					</div>
					<?php form_close() ?>
				</div>
				<div class="col-12 mt-3">
					<div id="map" style="height: 600px; width: auto;" data-map="[47,3,6]">
						<?php foreach($estateList as $estate) { ?>
							<span class="marker" data-address="<?=$estate->street?>>" data-zipcode="<?=$estate->zip_code?>" hidden>
								<h4><?= $estate->id . ' - ' . ($estate->estate_type ? $estate->estate_type : 'Non renseigné') ?></h4>
								<img class="img-fluid w-100" src="https://picsum.photos/300/200?random=<?= mt_rand(1,20) ?>" alt="Card image cap">
								<a href="estate/details/<?= $estate->id ?>">Voir le bien</a>
							</span>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="row">
				<div class="col-12">
					<a class="btn btn-primary d-block" href="estate/create">
						<i class="fa fa-plus"></i>
						Enregistrer un nouveau bien
					</a>
				</div>
				<div class="col-12 mt-3">
					<div class="estate-list bg-light py-2">
						<div id="estate-card" class="row justify-content-center">
							<?php foreach ($estateList as $estate) : ?>
								<div class="col-11 mb-2">
									<div class="card">
										<a class="link-wrapper" href="estate/details/<?= $estate->id ?>"></a>
										<img class="card-img-top" src="https://picsum.photos/300/200?random=<?= mt_rand(1,20) ?>" alt="Card image cap">
										<div class="card-body">
											<p class="small mb-0">Type de bien : <?= $estate->estate_type ? $estate->estate_type : '-' ?></p>
											<p class="small mb-0"><?= $estate->rooms_numbers ? $estate->rooms_numbers : '-' ?> pièces</p>
											<p class="small mb-0">Ville : <?= $estate->city ? $estate->city : '-' ?></p>
											<p class="small mb-0">Prix : <?= $estate->price ? $estate->price.' €' : '-' ?></p>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
	<div class="row my-5">
		<div class="col-6">
			<!-- Emplacement pour la carte -->
		</div>
		<div class="col-6">
			<div class="card-columns">

			</div>
		</div>
	</div>








</div>

