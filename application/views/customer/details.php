<h1 class="text-center"><?= $title ?></h1>

<div class="row justify-content-around mt-5">
    <div class="card rounded p-4 col-md-5 shadow">
        <h2>Informations sur <?= $client->lastname . ' ' . $client->firstname ?></h2>
        <div class="row mt-5">
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
    <div class="card rounded p-4 col-md-5 shadow">
        <h2>Informations générales</h2>
        <div class="row mt-5">
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
    <div class="rounded p-4 col-md-4">
    <table class="table table-hover text-center shadow border bg-white">
            <thead class="thead-dark">
                <tr>
                    <th>Liste des RDV de <?= $client->lastname . ' ' . $client->firstname ?></th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>test</td>
                    </tr>
            </tbody>
        </table>
        </div>
    <div class="rounded p-4 col-md-4">
    <table class="table table-hover text-center shadow border bg-white">
            <thead class="thead-dark">
                <tr>
                    <th>Informations complémentaires</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>test</td>
                    </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>

    
    