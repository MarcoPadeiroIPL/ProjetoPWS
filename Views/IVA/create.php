<div class="row min-wh-100 mt-0" style="background-color:rgba(243,243,244,255);">
    <span class="fs-3">IVAS</span>
</div>
<div class="row" style="height:95.3245vh; background-color: #e8e8e9;">
    <div class="row" style="margin-top: 5rem;">
        <div class="col"><a href="router.php?c=iva&a=index"><i class="display-4 bi bi-arrow-left-circle"></i></a></div>
        <div class="col-6 shadow-lg" style="height: 30vh;">
            <div class="row">
                <div class="col-4 mt-5" style="display: flex; justify-content: center; align-items: center;">
                    <i class="display-1 bi bi-percent"></i>
                </div>
                <div class="col">
                    <div class="row mt-5">
                        <form action="router.php?c=iva&a=store" method="post" class="needs-validation row justify-content-center">
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Descricao:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="text" value="<?php if (isset($error)) echo $iva->descricao ?>" class="form-control" id="inputDescricao" name="descricao" required></span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Percentagem:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="text" value="<?php if (isset($error)) echo $iva->percentagem ?>" class="form-control <?php if (isset($error) && $error['descricao']) echo 'is-invalid' ?>" id="inputPercentagem" name="percentagem" required></span></div>
                                    <?php if (isset($error) && $error['percentagem']) { ?>
                                        <div class="row text-danger" style="display: flex; justify-content: center; align-items: center;"><?= $error['percentagem'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Em vigor:</span></div>
                                <div class="col mb-2">

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="1" name="vigor" id="radioVigor" <?php if (isset($error) && $iva->vigor == 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } else if (!isset($error)) {
                                                                                                                                        echo 'checked';
                                                                                                                                    }  ?>>
                                                <label class="form-check-label" for="vigor">
                                                    Sim
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="0" name="vigor" id="radioVigor" <?php if (isset($error) && $iva->vigor == 0) echo 'checked' ?>>
                                                <label class="form-check-label" for="vigor">
                                                    Não
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="w-50 btn btn-dark mt-2">Criar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div> <!-- /row -->