<div class="background"></div>
<div class="background-filter"></div>


<div class="container">
	<?= $breadcrumb ?>

    <?php $this->load->view('/partials/_calendar_script.php') ?>
	<div class="row">
		<div class="col-12 mb-3 clearfix">
			<a href="<?= site_url('appointment/create/') ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Ajouter un rendez-vous</a>
		</div>
		<div class="col-12 bg-white py-3 shadow">
			<?php $this->load->view('/common/_appointments.php') ?>
		</div>
	</div>
    <?php $this->load->view('/appointment/event.php') ?>

</div>



