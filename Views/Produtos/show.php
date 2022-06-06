<div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
    <span class="fs-3">Produto</span>
</div>
<div class="row" style="height:95.3245vh; background-color: #e8e8e9;">
    <div class="row" style="margin-top: 5rem;">
        <div class="col"><a href="router.php?c=produto&a=index"><i class="display-4 bi bi-arrow-left-circle"></i></a></div>
        <div class="col-6 shadow-lg" style="height:40vh;">
            <div class="row">
                <div class="col-4 mt-5" style="display: flex; justify-content: center; align-items: center;">
                    <i class="display-1 bi bi-cart3"></i>
                </div>
                <div class="col">
                    <div class="row mt-5">
                        <div class="row mb-4">
                            <div class="pr-3 shadow" style="width:3vw; border-radius:15px;">
                                <a href="router.php?c=produto&a=edit&id=<?= $produto->id ?>" class="text-decoration-none"><i class="bi fs-2 bi-pencil"></i></a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row mb-2 text-start"><span class="fs-5">Referencia:</span></div>
                            <div class="row mb-2 text-start"><span class="fs-5">Descrição:</span></div>
                            <div class="row mb-2 text-start"><span class="fs-5">Preço:</span></div>
                            <div class="row mb-2 text-start"><span class="fs-5">Stock:</span></div>
                            <div class="row mb-2 text-start"><span class="fs-5">IVA:</span></div>
                        </div>
                        <div class="col">
                            <div class="row mb-2 text-end"><span class="fs-5"><?= ($produto->referencia) ?></span></div>
                            <div class="row mb-2 text-end"><span class="fs-5"><?= ($produto->descricao) ?></span></div>
                            <div class="row mb-2 text-end"><span class="fs-5"><?= ($produto->preco) ?>€</span></div>
                            <div class="row mb-2 text-end"><span class="fs-5"><?= ($produto->stock) ?></span></div>
                            <div class="row mb-2 text-end"><span class="fs-5"><?= $produto->iva->descricao ?> (<?= $produto->iva->percentagem ?>%)</span></div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div> <!-- /row -->
</div> <!-- /row -->