<div class="container my-5">
    <div class="row justify-content-around">
        <div class="card rounded p-4 col-md-6">
            <h2>Informations sur <?= $client->lastname . ' ' . $client->firstname ?></h2>
            <div class="row">
                <div class="col-6">
                    <ul class="mt-5">
                        <li>
                            <h4 class="lead">Age</h4>
                            <p><?= date_diff(date_create($client->birthdate), date_create('now'))->y . ' ans' ?></p>
                        </li>
                        <li>
                            <h4 class="lead">Status</h4>
                            <p><?= ($client->name_status) ?></p>
                        </li>
                        <li>
                            <h4 class="lead">Email</h4>
                            <p><?= ($client->mail) ?></p>
                        </li>
                        </ul>
                        </div>
                        <div class="col-6">
                            <ul class="mt-5">
                            <li>
                                <h4 class="lead">Téléphone</h4>
                                <p><?= ($client->phone) ?></p>
                            </li>
                                <li>
                                    <h4 class="lead">Adresse</h4>
                                    <p><?= $client->street . '<br>' . $client->zipcode ?></p>
                                </li>
                                <li>
                                    <h4 class="lead">Ville</h4>
                                    <p><?= $client->name_cities ?></p>
                                </li>
                            </ul>
                            <div class="row justify-content-end mt-auto">
                                <a href="<?= site_url('customer/edit/' . $client->id) ?>" class="btn btn-secondary text-white mx-3"><i class="fas fa-pen"></i> Modifier</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded p-4 col-md-6">
                    <h2>Informations générales</h2>
                    <div class="row">
                        <div class="col-6">
                        <ul class="mt-5">
                        <li>
                            <h4 class="lead">Agent immobilier</h4>
                            <p><?= ($client->name_status) ?></p>
                        </li>
                        <li>
                            <h4 class="lead">Inscrit depuis</h4>
                            <p><?= nice_date($client->date_register, 'd-m-Y') ?></p>
                        </li>
                        <li>
                            <h4 class="lead">Type de bien</h4>
                            <p><?= ($client->phone) ?></p>
                        </li>
                        </ul>
                        </div>
                        <div class="col-6">
                            <ul class="mt-5">
                            <li>
                                <h4 class="lead">Type de demande</h4>
                                <p><?= ($client->phone) ?></p>
                            </li>   
                            </li>
                                <h4 class="lead">Nombres de pièces</h4>
                                <p><?= ($client->phone) ?></p>
                            </li>
                            </ul>
                            <div class="row justify-content-end mt-auto">
                                <a href="<?= site_url('customer/edit/' . $client->id) ?>" class="btn btn-secondary text-white mx-3"><i class="fas fa-pen"></i> Modifier</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="row justify-content-around mt-5">
                <div class="rounded p-4 col-md-12">
                <table class="table table-hover text-center shadow border bg-white">
                    <tbody>
                        <thead class="thead-dark">
                            <?php if (empty($appointements)) { ?>
                                <tr>
                                    <th>Information sur les rendez-vous</th>
                                </tr>
                                <tr>
                                    <td>Vous n'avez pas de rendez-vous </td>
                                </tr>
                            <?php } else {?>
                                <tr>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Avec</th>
                                    <th>Note</th>
                                    <th></th>
                                </tr>
                            <?php foreach ($appointements as $appointement) { ?>
                                <?php 
                                $time  = $appointement->date_start;
                                $time_start = explode(" ", $time);  
                                ?>

                                <tr>
                                    <td><?php echo nice_date($time_start[0], 'd/m/Y') ?></td>
                                    <td><?php echo $time_start[1] ?></td>
                                    <td><?= $appointement->lastname . ' ' . $appointement->firstname ?></td>
                                    <td><?= $appointement->note ?></td>
                                    <td><a style="float:right" href="<?= site_url('appointment/edit/' . $appointement->id) ?>" class="btn btn-outline-secondary mx-1"><i class="fas fa-edit"></i></a></td>
                                </tr>
                                <?php } ?>
                        <?php } ?>
                        </thead>
                        </tbody>
                    </table>
                    <div class="rounded p-4 col-md-12">
                        <a href="<?= site_url('appointment/create/') ?>" class="btn btn-danger mr-3"><i class="fas fa-plus"></i> Ajouter un rendez-vous</a>
                    
                    </div>  
                    
            </div>
                
        </div>
               
    </div>
                
</div>

        
        