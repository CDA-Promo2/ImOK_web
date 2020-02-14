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
						<input type="text" name="search" id="search" class="form-control" placeholder="Recherche d'un bien ...">
						<div class="input-group-append">
							<button class="btn btn-info">
								<i class="fa fa-search"></i>
								Rechercher
							</button>
						</div>
					</div>
					<?php form_close() ?>
				</div>
				<div class="col-12 mt-3">
					<img src="<?=base_url('assets/img/map.jpg')?>" alt="" class="img-fluid">
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
						<div class="row justify-content-center">
							<?php foreach ($estateList as $estate) : ?>
								<div class="col-11 mb-2">
									<div class="card">
										<a class="link-wrapper" href="estate/details/<?= $estate->id ?>"></a>
										<img class="card-img-top" src="https://picsum.photos/300/200?random=<?= mt_rand(1,20) ?>" alt="Card image cap">
										<div class="card-body">
											<p class="small mb-0">Type mandat <?= $estate->estate_type ? ' - ' . $estate->estate_type : '' ?></p>
											<p class="small mb-0"><?= $estate->rooms_numbers ? $estate->rooms_numbers.' pièces' : '' ?><?= $estate->city ? ' - '.$estate->city : '' ?></p>
											<p class="small mb-0"><?= $estate->price ? $estate->price.' €' : '' ?></p>
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

