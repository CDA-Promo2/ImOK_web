<h1 class="text-center"><?= $title ?></h1>

<div class="container p-5">
<table class="table table-hover text-center shadow border bg-white">
            <thead class="thead-dark">
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Mail</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer) { ?>
                    <tr>
                        <td><?= $customer->firstname ?></td>
                        <td><?= $customer->lastname ?></td>
                        <td><?= $customer->mail ?></td>
                        <td class="d-flex justify-content-end">
                            <a href="<?= site_url('customer/details/' . $customer->id) ?>" class="btn btn-outline-secondary mx-1"><i class="fas fa-user-tie"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="<?= site_url('customer/create/') ?>" class="btn btn-danger mr-3"><i class="fas fa-plus"></i> Ajouter client</a>
    </div>