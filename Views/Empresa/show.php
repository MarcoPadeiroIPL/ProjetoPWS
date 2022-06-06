        <div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
        <span class="fs-3">Empresa</span>
    </div>
    <div class="row" style="height:95.3245vh; background-color: #e8e8e9;">
        <div class="row" style="margin-top: 5rem;">
            <div class="col"></div>
            <div class="col-6 shadow-lg"  style="height:55vh;">
                <div class="row">
                    <div class="col-4"  style="display: flex; justify-content: center; align-items: center;">
                        <i class="display-1 bi bi-building"></i>    
                    </div>
                    <div class="col">
                        <div class="row mt-5">
                            <div class="row mb-4">
                                <div class="pr-3 shadow" style="width:3vw; border-radius:15px;">
                                    <a href="router.php?c=empresa&a=edit&id=<?=$empresa->id?>" class="text-decoration-none"><i class="bi fs-2 bi-pencil"></i></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row mb-2 text-start"><span class="fs-5">D. Social:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Email:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Telefone:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">NIF:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Morada:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Codigo Postal:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Localidade:</span></div>
                                <div class="row mb-2 text-start"><span class="fs-5">Capital Social:</span></div>
                            </div>
                            <div class="col">
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($empresa->designsocial)?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($empresa->email)?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($empresa->telefone)?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($empresa->nif)?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($empresa->morada)?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($empresa->codpostal)?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($empresa->localidade)?></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><?= ($empresa->capitalsocial)?></span></div>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div> <!-- /row -->
    </div> <!-- /row -->