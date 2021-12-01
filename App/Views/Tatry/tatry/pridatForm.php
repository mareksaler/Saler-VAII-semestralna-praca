<!-- Modal -->
<div class="modal fade" id="pridajTuru" data-bs-backdrop="static" tabindex="-1" aria-labelledby="pridajTuruLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pridajTuruLabel">Pridať túru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="?c=Tatry&a=pridaj">
                    <div>
                        <?php if($data['error'] != "") { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php $data['error']?>/strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label for="nazov" class="form-label">Názov:</label>
                            <input type="text" id="nazov" name="nazov" class="form-control" maxlength="254" >
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Obrázok</label>
                            <input name="file" class="form-control" id="formFile" type="file" required>
                        </div>
                        <div class="mb-3">
                            <label for="popis" class="form-label">Popis:</label>
                            <textarea class="form-control" id="popis" rows="10" name="popis" minlength="1" maxlength="5000" ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dlzka" class="form-label">Dĺžka:</label>
                            <input type="number" id="dlzka" name="dlzka" class="form-control" step="0.01" min="0.01" max="100" required>
                        </div>
                        <div class="mb-3">
                            <label for="cas" class="form-label">Čas:</label>
                            <input type="time" id="cas" name="cas" class="form-control" required>
                        </div>
                        <input type="hidden" name="area" value="v" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrušiť</button>
                        <button type="submit" class="btn btn-primary" >Pridať</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>