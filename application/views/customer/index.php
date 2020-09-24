<div class="background"></div>
<div class="background-filter"></div>

<div class="container">

	<?= $breadcrumb ?? '<div class="my-5">breadcrumb</div>' ?>
	<div class="row">
		<div class="col-12 clear-flix">
			<a href="<?= site_url('customer/create/') ?>" class="btn btn-success float-right"><i class="fas fa-plus"></i> Ajouter client</a>
			<form action="" method="get" class="float-left">
				<div class="input-group form-group">
					<input type="text" name="search" placeholder=" Nom ou Prénom" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
					<div class="input-group-append">
						<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-12">
			<table class="table table-hover text-center shadow border bg-white">
				<thead class="thead-dark">
				<tr>
					<th>Prénom</th>
					<th>Nom</th>
					<th>Mail</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($customers as $customer) { ?>
					<tr>
						<td><?= $customer->firstname ?></td>
						<td><?= $customer->lastname ?></td>
						<td><?= $customer->mail ?></td>
						<td class="d-flex justify-content-end">
							<a href="<?= site_url('customer/details/' . $customer->id) ?>" class="btn btn-outline-secondary mx-1"><i class="fas fa-user-tie"></i></a>
							<a href="<?= site_url('customer/details/' . $customer->id) ?>" class="btn btn-outline-danger mx-1"><i class="fas fa-archive"></i></a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="col-12">
			<?= $pagination ?>
		</div>
	</div>
	
</div>
