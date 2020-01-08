<h1 class="text-center"><?= $title ?></h1>

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
        <a href="<?= site_url('customer/create/') ?>" class="btn btn-danger mr-3"><i class="fas fa-plus"></i> Ajouter client</a>
    </div>
