<div class="container p-5 my-5 panel-group shadow">
    <h1><?= $title ?></h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_appointments">
      Enregistrer un rendez-vous
    </button>
    <?php $this->load->view('/common/_appointments.php') ?>
    <?php $this->load->view('/appointment/create.php') ?>
    <?php $this->load->view('/appointment/event.php') ?>
</div>

<script>



</script>



