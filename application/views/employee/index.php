<div class="row no-gutters">

	<?php if($_SESSION['user']->id_roles == 1){ ?>
		<!-- Admin MainBoard -->

	<?php } else { ?>
		<!-- Employee MainBoard -->
		<div class="col-12 col-md-8 p-2">
			<?php $this->load->view('/partials/cards/_'.$dashboard[$_SESSION['user']->id_roles][0].'-card.php'); ?>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class="row no-gutters">
				<?php for($link = 1; $link<5; $link++){ ?>
					<div class="col-12 p-2">
						<div class="card p-2">
							<?= $dashboard[$_SESSION['user']->id_roles][$link] ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>

</div>
