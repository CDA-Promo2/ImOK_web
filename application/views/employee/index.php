<div class="row">

	<?php if($_SESSION['user']->id_roles == 1){ ?>
		<!-- Admin MainBoard -->

	<?php } else { ?>
		<!-- Employee MainBoard -->
		<div class="col-12 col-md-8 col-lg-9 p-3 main-card">
			<?php $this->load->view('/partials/cards/_'.$dashboard[$_SESSION['user']->id_roles][0].'-card.php'); ?>
		</div>
		<div class="col-12 col-md-4 col-lg-3 ">
			<div class="row">
				<div class="col-12 secondary-cards p-3">
					<?php for($link = 1; $link<5; $link++){ ?>
						<div class="card p-2">
							<h4 class="card-title"><?= $dashboard[$_SESSION['user']->id_roles][$link] ?></h4>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>

</div>
