<!-- Modal -->
<div class="modal fade" id="vysokeTatry<?=$vysokeTatry->getId()?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=$vysokeTatry->getName()?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <img src="<?= \App\Config\Configuration::UPLOAD_DIR . $vysokeTatry->getImage() ?>" min-height="400px" class="card-img-top" alt="...">
                </div>
                <div class="row">
                    <div class="col">
                        <h6>Čas: <?=$vysokeTatry->getTime()?></h6>
                    </div>
                    <div class="col">
                        <h6>Dĺžka túry: <?=$vysokeTatry->getDistance()?> Km</h6>
                    </div>
                </div>
                <div class="row">
                    <p>
                        <?=$vysokeTatry->getText()?>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvoriť</button>
            </div>
        </div>
    </div>
</div>