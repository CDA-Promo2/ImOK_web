<div class="row mt-5">
	<div class="col-8">
		<?php form_open() ?>
		<div class="row form-group my-1 ml-3">
			<div class="col-8">
				<input type="text" name="search" id="search" class="form-control" placeholder="Recherche d'un bien ...">
			</div>
		</div>
		<?php form_close() ?>
	</div>
	<div class="col-4">
		<a class="btn btn-outline-secondary" href="estate/create">Créer un nouveau bien</a>
	</div>
</div>
<div class="row my-5">
	<div class="col-6">
		<!-- Emplacement pour la carte -->
	</div>
	<div class="col-6">
		<div class="card-columns">
			<?php foreach ($estateList as $estate): 
				
				$prices  = $estate->price;
				$price = explode(".", $prices);

				?>

				
				<div class="card">
					<a class="link-wrapper" href="estate/details/<?= $estate->id ?>"></a>
					<img class="card-img-top" src="https://picsum.photos/300/200" alt="Card image cap">
					<div class="card-body">
						<p class="small mb-0">Type mandat <?= $estate->estate_type ? ' - ' . $estate->estate_type : '' ?></p>
						<p class="small mb-0"><?= $estate->rooms_numbers ? $estate->rooms_numbers.' pièces' : '' ?><?= $estate->city ? ' - '.$estate->city : '' ?></p>
						<p class="small mb-0"><?= $price[0] ? $price[0].' €' : '' ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
