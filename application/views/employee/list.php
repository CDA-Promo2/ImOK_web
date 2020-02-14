<div class="background"></div>
<div class="background-filter"></div>

<div class="container">

<?= $breadcrumb ?>

<div class="row justify-content-center text-center">


<?php if($employees){ ?>
	<div class="col-md-8 col-lg-6">
		<table class="table table-hover border shadow bg-white">
			<thead class="thead-dark">
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Rôle</th>
				<th></th>
			</tr>
			</thead>
			<tbody>

			<?php foreach($employees as $employee){ ?>
				<tr>
					<td><?=$employee->lastname?></td>
					<td><?=$employee->firstname?></td>
					<td><?=$employee->role?></td>
					<td><a href="<?=site_url('employee/edit/'.$employee->id)?>" class="btn btn-outline-secondary mx-1"><i class="fas fa-user-tie"></i></a></td>
				</tr>
			<?php } ?>

			</tbody>
		</table>
	</div>

<?php }else{ ?>
	<p>Aucun collaborateur n'est enregistré</p>
<?php } ?>

</div>
	
</div>
