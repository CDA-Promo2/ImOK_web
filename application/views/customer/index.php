<?php 

$typecivility = array(
    0 => 'Monsieur',
    1 => 'Madame'
);

var_dump($typecivility);

?>

<div class="container p-5">
    <h1 class="text-center"><?= $title ?></h1>
</div>

<div class="container p-5">
<table class="table table-hover text-center shadow border bg-white">
            <thead class="thead-dark">
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Rue</th>
                    <th>Complement</th>
                    <th>ZipCode</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Mail</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer) { ?>
                    <tr>
                        <td><?= $customer->firstname ?></td>
                        <td><?= $customer->lastname ?></td>
                        <td><?= $customer->street ?></td>
                        <td><?= $customer->complement ?></td>
                        <td><?= $customer->zip_code ?></td>
                        <td><?= $customer->name_cities ?></td>
                        <td><?= $customer->phone ?></td>
                        <td><?= $customer->mail ?></td>
                        <td><?= $customer->name_status ?></td>
                        <td class="d-flex justify-content-end">
                            <button type="button" data-toggle="modal" data-target="#delete<?= $customer->id ?>" class="btn btn-outline-danger mx-1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php foreach ($customers as $customer) { ?>
            <div class="modal fade" id="delete<?= $customer->id ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content text-center">
                        <h2 class="bg-dark text-white p-2">Attention</h2>
                        <p>Voulez-vous supprimer <b><?= $customer->firstname . ' ' . $customer->lastname ?></b>?</p>
                        <div class="row justify-content-center">
                            <a href="<?= site_url('delete/' . $customer->id) ?>" class="btn btn-outline-danger col-4 my-3">Confirmer</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <a href="<?= site_url('create') ?>" class="btn btn-danger mr-3"><i class="fas fa-plus"></i> Ajouter client</a>
    </div>

    <hr>

    <div class="container p-5">
        <h1 class="text-center">Ajout d'un client</h1>
    </div>

    <?= form_error() ?>
<div class="row justify-content-center">
    <div class="form col-md-12 col-lg-8 mt-5">
        <?= form_open_multipart(); ?>
        <div class="form-group my-1">
            <label for="civility">Civilité</label>
            <select name="civility" class="form-control">
                <option value="0" selected disabled>Veuillez choisir une civilité</option>
                <?php foreach ($customers as $customer): ?>
                    <option value="<?= $customer->id ?>" <?= $_POST && $_POST['civility'] == $customer->id ? 'selected' : '' ?>><?= $typecivility ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group my-1">
            <label for="lastname">Nom</label> <?= form_error('lastname') ?>
            <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $_POST['lastname'] ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="firstname">Prénom</label> <?= form_error('firstname') ?>
            <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $_POST['firstname'] ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="street">Adresse</label> <?= form_error('street') ?>
            <input type="text" id="street" name="street" class="form-control" value="<?= $_POST['street'] ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="complement">Complement</label> <?= form_error('complement') ?>
            <input type="text" id="complement" name="complement" class="form-control" value="<?= $_POST['complement'] ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="phone">Telephone</label> <?= form_error('phone') ?>
            <input type="text" id="phone" name="phone" class="form-control" value="<?= $_POST['phone'] ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="mail">Mail</label> <?= form_error('mail') ?>
            <input type="email" id="mail" name="mail" class="form-control" value="<?= $_POST['mail'] ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="name_cities">Ville</label> <?= form_error('name_cities') ?>
            <input type="text" id="name_cities" name="name_cities" class="form-control" value="<?= $_POST['name_cities'] ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="zip_code">Code Postal</label> <?= form_error('zip_code') ?>
            <input type="text" id="zip_code" name="zip_code" class="form-control" value="<?= $_POST['zip_code'] ?? '' ?>">
        </div>

        <div class="form-group my-1">
            <label for="id_Marital_Status">Statut</label>
            <select name="id_Marital_Status" class="form-control">
                <option value="0" selected disabled>Veuillez choisir un Status</option>
                <?php foreach ($marital_status as $status): ?>
                <?php echo 'test'; ?>
                    <option value="<?= $status->id ?>" <?= $_POST && $_POST['id_Marital_Status'] == $status->id ? 'selected' : '' ?>><?= $status->id ?>. <?= $status->name_status ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row justify-content-around my-5">
            <a href="<?= site_url() ?>" class="btn btn-secondary col-4">Retour</a>
            <input type="submit" class="form-control btn btn-success col-4" name="update">
        </div>
    </div>
</div>