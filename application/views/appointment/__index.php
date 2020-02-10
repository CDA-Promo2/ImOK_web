<div class="container p-5 my-5 panel-group shadow">
    <h1><?= $title ?></h1>
    <div class="row justify-content-end">
            <form action="" method="get">
            <select name="employee">
				        <option value="0" selected disabled>Choisir un employé</option>
				          <?php foreach ($employees as $employee): ?>
					        <option value="<?php isset($_GET['employee']) ? $_GET['employee'] : '' ?>"><?= $employee->id ?>. <?= $employee->firstname ?></option>
			          	<?php endforeach; ?>
			        </select>
            <input type="date" name="date" placeholder=" Date" value="<?= isset($_GET['date']) ? $_GET['date'] : '' ?>">
                <input type="text" name="search" placeholder="Client" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
            </form>
    </div>

    
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
<div class="row justify-content-between my-4">
        <div class="col-md-5">
        <a href="<?= site_url('appointment/create/') ?>" class="btn btn-danger mr-3"><i class="fas fa-plus"></i> Ajouter un rendez-vous</a>
        </div>
        <div class="col-md-7">
            <?= $pagination ?>
        </div>
    </div>
</div>



