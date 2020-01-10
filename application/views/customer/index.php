<div class="container p-5 my-5 shadow">
<h1><?= $title ?></h1>
<div style="float:right" class="my-1">
            <form action="" method="get">
                <input type="text" name="search" placeholder=" Nom ou Prénom" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
            </form>
        </div>
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
        <div class="row justify-content-between">
        <div class="col-md-5">
        <a href="<?= site_url('customer/create/') ?>" class="btn btn-danger mr-3"><i class="fas fa-plus"></i> Ajouter client</a>
        </div>
        <div class="col-md-7">
            <?= $pagination ?>
        </div>
    </div>