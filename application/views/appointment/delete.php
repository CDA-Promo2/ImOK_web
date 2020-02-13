<?php foreach ($appointments as $appointment) { ?>
            <div class="modal fade" id="delete<?= $appointment->id ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content text-center">
                        <h2 class="bg-dark text-white p-2">Attention</h2>
                        <p>Voulez-vous supprimer <b><?= $appointment->note ?></b>?</p>
                        <div class="row justify-content-center">
                            <a href="<?= site_url('delete/' . $appointment->id) ?>" class="btn btn-outline-danger col-4 my-3">Confirmer</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>