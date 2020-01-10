<?php var_dump($_POST);?>

<h1 class="text-center"><?= $title . ' ' . $client->lastname . ' ' . $client->firstname?></h1>

    <?= form_error(); ?>
    <div class="row justify-content-center">
    <div class="form col-md-12 col-lg-8 mt-5">
        <?= form_open_multipart(); ?>

        <div class="form-group my-1">
			<input type="hidden" name="civility" value="<?= $client->civility ?? '' ?>">
		</div>
        <div class="form-group my-1">
			<input type="hidden" name="date_register" value="<?= $client->date_register ?? '' ?>">
		</div>
        <div class="form-group my-1">
            <label for="lastname">Nom</label> <?= form_error('lastname') ?>
            <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $client->lastname ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="firstname">Prénom</label> <?= form_error('firstname') ?>
            <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $client->firstname ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="id_marital_status">Statue</label><?= form_error('id_marital_status') ?>
            <select name="id_marital_status" class="form-control">
                <option value="0" selected disabled>Veuillez choisir un Status</option>
                <?php foreach ($marital_status as $status): ?>
                    <option value="<?= $status->id ?>" <?= $client->id_marital_status == $status->id ? 'selected' : '' ?>><?= $status->id ?>. <?= $status->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group my-1">
            <label for="birthdate">Date de naissance</label> <?= form_error('birthdate') ?>
            <input type="date" id="birthdate" name="birthdate" class="form-control" value="<?= $client->birthdate ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="street">Adresse</label> <?= form_error('street') ?>
            <input type="text" id="street" name="street" class="form-control" value="<?= $client->street ?? '' ?>">
        </div>
        <div class="form-group my-1">
          <?= form_error('complement') ?>
            <input type="text" id="complement" name="complement" class="form-control" value="<?= $client->complement ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="id_cities">Ville</label> <?= form_error('id_cities') ?>
            <input type="number" id="id_cities" name="id_cities" class="typeahead form-control" value="<?= $client->id_cities ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="phone">Telephone</label> <?= form_error('phone') ?>
            <input type="text" id="phone" name="phone" class="form-control" value="<?= $client->phone ?? '' ?>">
        </div>
        <div class="form-group my-1">
            <label for="mail">Mail</label> <?= form_error('mail') ?>
            <input type="text" id="mail" name="mail" class="form-control" value="<?= $client->mail ?? '' ?>">
        </div>
        <div class="row justify-content-around my-5">
            <a href="<?= site_url('customer/details/' . $client->id) ?>" class="btn btn-secondary col-4">Retour</a>
            <input type="submit" class="form-control btn btn-success col-4" name="update">
        </div>
</div>
