<h1 class="text-center"><?= $title ?></h1>

    <?php foreach ($appointments as $i => $appointment) { ?>
      <?php  
        $time  = $appointment->date_start;
        $time_start = explode(" ", $time);
        ?>
    <div class="container p-1 panel-group">
        <div class="panel-group shadow p-2 rounded" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                 <h4 class="panel-title">
                 <div class="row">
                 <div class="col-md-4">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" style="color:black"><?= nice_date($appointment->date_start, 'd-m-Y') . ' | ' . $appointment->lastnameEmployees ?></a>
                 </div>
                 <div class="col-md-4">
                 <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" style="color:black"><?= '<strong>Object :</strong> ' . $appointment->description ?> </a>
                 </div>
                 <div class="col-md-4">
                 <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" style="color:black"> <?= ' <strong>Heure :</strong> ' . $time_start[1]; ?> </a>
                 <a style="float:right" href="<?= site_url('appointment/edit/' . $appointment->id) ?>" class="btn btn-outline-secondary mx-1"><i class="fas fa-edit"></i></a> 
                </div>
                 </div>
        </h4>
      </div>
      <div id="collapse<?=$i?>" class="panel-collapse collapse in">
        <div class="panel-body">
        <div class="row">
        <div class="col-md-6">
        <a href="mailto:<?= $appointment->mail ?>" style="color:black"><i class="fas fa-envelope"></i> <?= $appointment->mail ?></a>
        </div>
        <div class="col-md-6">
        <a href="mailto:<?= $appointment->mail ?>" style="color:black"><i class="fas fa-phone"></i> <?= $appointment->phone ?></a>
        </div>
        </div>
        <div class="row">
        <div class="col">
        <p style="color:black"><i class="fas fa-sticky-note"></i> <?= $appointment->note ?></p>
        </div>
        </div>
        </div>
      </div>
    </div>
  </div> 
  </div>
        <?php } ?>

 <div class="container p-3">
     <a href="<?= site_url('appointment/create/') ?>" class="btn btn-danger mr-3"><i class="fas fa-plus"></i>Ajouter un rendez-vous</a>
</div>




