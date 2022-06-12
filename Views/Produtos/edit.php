<div class="row min-wh-100 mt-0" style="background-color:rgba(243,243,244,255);">
    <span class="fs-3">Produto</span>
</div>
<div class="row" style="height:95.3245vh; background-color: #e8e8e9;">
    <div class="row" style="margin-top: 5rem;">
        <div class="col"><a href="router.php?c=produto&a=index"><i class="display-4 bi bi-arrow-left-circle"></i></a></div>
        <div class="col-6 shadow-lg" style="height:35vh;">
            <div class="row">
                <div class="col-4 mt-5" style="display: flex; justify-content: center; align-items: center;">
                    <i class="display-1 bi bi-cart3"></i>
                </div>
                <div class="col">
                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="row mb-3 text-start"><span class="fs-5">Descrição:</span></div>
                            <div class="row mb-3 text-start"><span class="fs-5">Preço:</span></div>
                            <div class="row mb-3 text-start"><span class="fs-5">Stock:</span></div>
                            <div class="row mb-2 text-start"><span class="fs-5">IVA:</span></div>
                        </div>
                        <div class="col">
                            <form action="router.php?c=produto&a=update&id=<?= $produto->referencia ?>" method="post" class="needs-validation row justify-content-center">
                                <div class="row mb-2 text-end"><span class="fs-5"><input type="text" class="form-control" value="<?= $produto->descricao ?>" id="inputDescricao" name="descricao" required></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><input type="text" class="form-control" value="<?= $produto->preco ?>" id="inputPreco" name="preco" required></span></div>
                                <div class="row mb-2 text-end"><span class="fs-5"><input type="text" class="form-control" value="<?= $produto->stock ?>" id="inputStock" name="stock" required></span></div>
                                <div class="row mb-2 text-end">
                                    <span class="fs-5">
                                        <select class="form-select" id="inputIVA_id" name="iva_id" required>
                                            <?php foreach ($ivas as $iva) { ?>
                                                <option value="<?= $iva->id ?>" <?php if (isset($produto) && $produto->iva_id == $iva->id) echo 'selected' ?>><?= $iva->descricao ?> (<?= $iva->percentagem ?>%)</option>
                                            <?php } ?>
                                        </select>
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-dark mt-2">Editar</button>
                            </form>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div> <!-- /row -->
</div> <!-- /row -->