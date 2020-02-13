<div class="container p-5 my-5 panel-group shadow">
<?php var_dump($appointments); ?>
	<?= $breadcrumb ?>
    
    <div class="d-flex justify-content-between">
        <h1><?= $title ?></h1>
        <div>
        <a href="<?= site_url('appointment/create/') ?>" class="btn btn-primary mr-3"><i class="fas fa-plus"></i> Ajouter un rendez-vous</a>
        </div>
    </div>
    <?php $this->load->view('/partials/_calendar_script.php') ?>
    <?php $this->load->view('/common/_appointments.php') ?>
    <?php $this->load->view('/appointment/event.php') ?>
    <?php $this->load->view('/appointment/delete.php') ?>

</div>



