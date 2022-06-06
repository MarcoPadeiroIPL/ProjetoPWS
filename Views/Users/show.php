    <div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
        <span class="fs-3">Perfil</span>
    </div>
    <div class="row" style="height:95.3245vh; background-color: #e8e8e9;">
        <div class="row" style="margin-top: 5rem;">
            <?php if($id != $utilizador->id){ ?>
            <div class="col"><a href="router.php?c=<?= $utilizador->role ?>&a=index"><i class="display-4 bi bi-arrow-left-circle"></i></a></div>
            <?php } else { ?>
            <div class="col"></div>
            <?php } ?>
            <div class="col-6 shadow-lg" style="height:55vh;">
                <div class="row">
                    <div class="col-4" style="display: flex; justify-content: center; align-items: center;">
                        <i class="display-1 bi bi-person-square"></i>
                    </div>
                    <div class="col">
                        <div class="row mt-5">
                            <div class="row mb-4">
                                <div class="pr-3 shadow" style="width:3vw; border-radius:15px;">
                                    <?php if ($role != 'cliente') { ?>
                                        <?php if ($utilizador->id == $id) { ?>
                                            <a href="router.php?c=funcionario&a=atualizarPass" class="text-decoration-none"><i class="bi fs-2 bi-pencil"></i></a>
                                        <?php } else { ?>
                                            <a href="router.php?c=<?= $utilizador->role ?>&a=edit&id=<?= $utilizador->id ?>" class="text-decoration-none"><i class="bi fs-2 bi-pencil"></i></a>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row mb-2 text-start"><span class="fs-5">Username:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Email:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Telefone:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">NIF:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Morada:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Codigo Postal:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Localidade:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Perfil:</span></div>
                            </div>
                            <div class="col">
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($utilizador->username) ?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($utilizador->email) ?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($utilizador->telefone) ?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($utilizador->nif) ?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($utilizador->morada) ?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($utilizador->codpostal) ?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($utilizador->localidade) ?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($utilizador->role) ?></span></div>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div> <!-- /row -->
    </div> <!-- /row -->