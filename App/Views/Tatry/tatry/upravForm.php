<?php /** @var Array $vysokeTatry */ ?>
<!-- modal-->
<div class="modal fade" id="upravTuru<?=$vysokeTatry->getId()?>" tabindex="-1" data-bs-backdrop="static" aria-labelledby="upravTuruLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upravTuruLabel">Upravit túru <?=$vysokeTatry->getId()?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="?c=Tatry&a=upravit">
                    <div>
                        <div class="mb-3">
                            <label for="nazov" class="form-label">Názov:</label>
                            <input type="text" id="nazov" name="nazov" class="form-control" maxlength="254" value="<?=$vysokeTatry->getName()?>" >
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Obrázok</label>
                            <input name="file" class="form-control" id="formFile" type="file" value="<?= $vysokeTatry->getImage() ?>" >
                        </div>
                        <div class="mb-3">
                            <label for="popis" class="form-label">Popis:</label>
                            <textarea class="form-control" id="popis" rows="10" name="popis" >
                                                                    <?= $vysokeTatry->getText() ?>
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dlzka" class="form-label">Dĺžka:</label>
                            <input type="number" id="dlzka" name="dlzka" class="form-control" step="0.01" min="0.01" max="100" value="<?= $vysokeTatry->getDistance() ?>" >
                        </div>
                        <div class="mb-3">
                            <label for="cas" class="form-label">Čas:</label>
                            <input type="time" id="cas" name="cas" class="form-control" value="<?= $vysokeTatry->getTime() ?>" >
                        </div>
                        <input type="hidden" name="area" value="v" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrušiť</button>
                        <input type="hidden" name="uprav" value="<?=$vysokeTatry->getId()?>">
                        <button type="submit" class="btn btn-primary">Odoslat</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>