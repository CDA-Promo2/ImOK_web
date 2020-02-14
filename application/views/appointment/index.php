<div class="container">
	<?= $breadcrumb ?>
git
    <div class="d-flex justify-content-between">
        <h1><?= $title ?></h1>
        <div>
        <a href="<?= site_url('appointment/create/') ?>" class="btn btn-primary mr-3"><i class="fas fa-plus"></i> Ajouter un rendez-vous</a>
        </div>
    </div>
    <?php $this->load->view('/partials/_calendar_script.php') ?>
    <?php $this->load->view('/common/_appointments.php') ?>
    <?php $this->load->view('/appointment/event.php') ?>

</div>



