<?= form_error(); ?>
    <div class="row justify-content-center">
        <div class="form col-md-12 col-lg-8 mt-5">
            <?= form_open_multipart(); ?>
            <div class="row justify-content-between">
                <div class="form col-md-4">

                    <div class="form-group my-1">
                        <label for="date_start">Date et heure de début</label> <?= form_error('date_start') ?>
                        <input type="text" id="date_start" name="date_start" class="form-control" value="<?= $appointment->date_start ?? '' ?>">
                    </div>

                    <div class="form-group my-1">
                        <label for="date_end">Date et heure de fin</label> <?= form_error('date_end') ?>
                        <input type="text" id="date_end" name="date_end" class="form-control" value="<?= $appointment->date_end ?? '' ?>">
                    </div>

                    <div class="form-group my-1">
                        <label for="note">Note</label> <?= form_error('note') ?>
                        <input type="text" id="note" name="note" class="form-control" value="<?= $appointment->note ?? '' ?>">
                    </div>

                    <div class="form-group my-1">
                        <label for="id_appointment_types">Type</label><?= form_error('id_appointment_types') ?>
                        <select name="id_appointment_types" class="form-control">
                            <option value="0" selected disabled>Veuillez choisir le type de rendez-vous</option>
                            <?php var_dump($appointment_types); ?>
                                <?php foreach ($appointment_types as $description): ?>
                                    <option value="<?= $description->id ?>" <?= $appointment->id_appointment_types == $description->id ? 'selected' : '' ?>><?= $description->id ?>. <?= $description->description ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group my-1">
                        <label for="id_customers">Client</label><?= form_error('id_customers') ?>
                        <select name="id_customers" class="form-control">
                            <option value="0" selected disabled>Veuillez choisir un Client</option>
                                <?php foreach ($customers as $customer): ?>
                                    <option value="<?= $customer->id ?>" <?= $appointment->id_customers == $customer->id ? 'selected' : '' ?>><?= $customer->id ?>. <?= $customer->lastname . ' ' . $customer->firstname  ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group my-1">
                        <label for="id_employees">Employé</label><?= form_error('id_employees') ?>
                        <select name="id_employees" class="form-control">
                            <option value="0" selected disabled>Veuillez choisir un Employé</option>
                                <?php foreach ($employees as $employee): ?>
                                    <option value="<?= $employee->id ?>" <?= $appointment->id_employees == $employee->id ? 'selected' : '' ?>><?= $employee->id ?>. <?= $employee->lastname . ' ' . $employee->firstname  ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row justify-content-around my-5">
                        <a href="<?= site_url('appointment/') ?>" class="btn btn-secondary col-4">Retour</a>
                        <input type="submit" class="form-control btn btn-success col-4" name="update">
                    </div>
                              
                </div>

                <div class="col-md-8">

                    <table class="table table-hover text-center shadow border bg-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Type</th>
                                <th>Client</th>
                                <th>Employé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appointments as $appointment) { ?>

                                <?php
                                $time  = $appointment->date_start;
                                $time_start = explode(" ", $time);
                                ?>

                                <tr>
                                    <td><?php echo $time_start[0] ?></td>
                                    <td><?php echo $time_start[1] ?></td>
                                    <td><?= $appointment->description ?></td>
                                    <td><?= $appointment->firstnameCustomers . ' ' . $appointment->lastnameCustomers  ?></td>
                                    <td><?= $appointment->firstnameEmployees . ' ' . $appointment->lastnameEmployees  ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

        
                </div>
                                
            </div>                       
    
        </div>
 
    </div>