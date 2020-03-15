<div class="background"></div>
<div class="background-filter"></div>

<div class="container">
	<?= $breadcrumb ?? '<div class="my-5">breadcrumb</div>' ?>

	<div class="row">
		<div class="col-md-8">
			<div class="card h-100 shadow">
				<div class="card-body">
					<h2>
						<?= $client->civility == 0 ? 'M. ' : 'Mme ' ?>
						<?= $client->lastname .' '. $client->firstname?>
					</h2>
					<p class="text-muted">
						<?= $client->name_status.', ' ?>
						<?=date_diff(date_create($client->birthdate), date_create('now'))->y . ' ans' ?>
						Né(e) le <?= date('d/m/Y', strtotime($client->birthdate)) ?>
					</p>
					<hr>
					<p>
						<i class="fas fa-map-marker-alt text-alert"></i>
						<?= $client->street?>
						<?= $client->complement ? ', '.$client->complement : '' ?>
						<?= $client->zipcode ? ', '.$client->zipcode : '' ?>
						<?= $client->name_cities ? ' '.$client->name_cities : '' ?>
					</p>
					<p>
						<i class="fas fa-phone-alt text-alert"></i>
						<a href="tel:<?= $client->phone?>" class="text-dark"><?= $client->phone?></a>
					</p>
					<p>
						<i class="fas fa-envelope text-alert"></i>
						<a href="mailto:<?= $client->mail?>"  class="text-dark"><?= $client->mail?></a>
					</p>
				</div>
				<div class="card-footer">
					<a href="<?= site_url('customer/edit/'.$client->id)?>" class="btn btn-info float-right">
						<i class="fa fa-pen"></i>
						Mettre à jour la fiche client
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card h-100 shadow">
				<div class="card-body">
					<h2>Plus d'infos</h2>
					<p class="text-muted">
						Plus d'informations sur ce client
					</p>
					<hr>
				</div>
				<div class="card-footer">
					<a href="#" class="btn btn-info float-right">
						<i class="fa fa-eye"></i>
						Voir plus
					</a>
				</div>
			</div>
		</div>

		<div class="col-12">
			<div class="card mt-3 shadow">
				<div class="card-body">
					<?php if (empty($appointements)) { ?>
						<p>Ce client n'a pas de Rendez-vous</p>
					<?php } else {?>
						<table class="table table-hover text-center border bg-white">
							<thead class="thead-dark">
							<tr>
								<th>Date</th>
								<th>Heure</th>
								<th>Avec</th>
								<th>Note</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($appointements as $appointement) { ?>
								<?php $time  = $appointement->date_start; $time_start = explode(" ", $time); ?>
								<tr>
									<td><?php echo nice_date($time_start[0], 'd/m/Y') ?></td>
									<td><?php echo $time_start[1] ?></td>
									<td><?= $appointement->lastname . ' ' . $appointement->firstname ?></td>
									<td><?= $appointement->note ?></td>
									<td><a style="float:right" href="#" class="btn btn-outline-secondary mx-1"><i class="fas fa-edit"></i></a></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					<?php } ?>
				</div>

				<div class="card-footer">
					<a href="<?= site_url('appointment/create/?id='.$client->id) ?>" class="btn btn-info float-right">
						<i class="far fa-calendar-alt mr-2"></i>
						Prendre RDV avec ce client</a>
				</div>
			</div>

		</div>
	</div>
</div>
