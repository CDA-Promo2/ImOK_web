
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
			<?php foreach ($estateList as $estate): ?>
				<div class="card">
					<a class="link-wrapper" href="estate/details/<?= $estate->id ?>"></a>
					<img class="card-img-top" src="https://picsum.photos/300/200?random=<?= mt_rand(1,20) ?>" alt="Card image cap">
					<div class="card-body">
						<p class="small mb-0">Type mandat - Type bien</p>
						<p class="small mb-0">Nombre pièce - Ville</p>
						<p class="small mb-0">Prix</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
