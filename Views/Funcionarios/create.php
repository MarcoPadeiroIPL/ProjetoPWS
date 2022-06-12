<div class="row min-wh-100 mt-0" style="background-color:rgba(243,243,244,255);">
    <span class="fs-3">Funcionarios</span>
</div>
<div class="row" style="height:95.3245vh; background-color: #e8e8e9;">
    <div class="row" style="margin-top: 5rem;">
        <div class="col"><a href="router.php?c=funcionario&a=index"><i class="display-4 bi bi-arrow-left-circle"></i></a></div>
        <div class="col-6 shadow-lg" style="height: 65vh;">
            <div class="row">
                <div class="col-4 mt-5" style="display: flex; justify-content: center; align-items: center;">
                    <i class="display-1 bi bi-person-square"></i>
                </div>
                <div class="col">
                    <div class="row mt-5">
                        <form action="router.php?c=funcionario&a=store" method="post" class="needs-validation row justify-content-center">
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Username:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="text" value="<?php if (isset($error)) echo $funcionario->username ?>" class="form-control <?php if (isset($error) && $error['username']) echo 'is-invalid' ?>" id="inputUsername" name="username" required></span></div>
                                    <?php if (isset($error) && $error['username']) { ?>
                                        <div class="row text-danger" style="display: flex; justify-content: center; align-items: center;"><?= $error['username'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Password:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="password" class="form-control" id="inputPassword" name="password" required></span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Email:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="email" value="<?php if (isset($error)) echo $funcionario->email ?>" class="form-control <?php if (isset($error) && $error['email']) echo 'is-invalid' ?>" id="inputEmail" name="email" required></span></div>
                                    <?php if (isset($error) && $error['email']) { ?>
                                        <div class="row text-danger" style="display: flex; justify-content: center; align-items: center;"><?= $error['email'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Telefone:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="text" value="<?php if (isset($error)) echo $funcionario->telefone ?>" class="form-control <?php if (isset($error) && $error['telefone']) echo 'is-invalid' ?>" id="inputTelefone" name="telefone" required></span></div>
                                    <?php if (isset($error) && $error['telefone']) { ?>
                                        <div class="row text-danger" style="display: flex; justify-content: center; align-items: center;"><?php if (is_array($error['telefone'])) {
                                                                                                                                                foreach ($error['telefone'] as $e) echo $e;
                                                                                                                                            } else {
                                                                                                                                                echo $error['telefone'];
                                                                                                                                            } ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">NIF:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="text" value="<?php if (isset($error)) echo $funcionario->nif ?>" class="form-control <?php if (isset($error) && $error['nif']) echo 'is-invalid' ?>" id="inputNIF" name="nif" required></span></div>
                                    <?php if (isset($error) && $error['nif']) { ?>
                                        <div class="row text-danger" style="display: flex; justify-content: center; align-items: center;"><?php if (is_array($error['nif'])) {
                                                                                                                                                foreach ($error['nif'] as $e) echo $e;
                                                                                                                                            } else {
                                                                                                                                                echo $error['nif'];
                                                                                                                                            } ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Morada:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="text" class="form-control" value="<?php if (isset($error)) echo $funcionario->morada ?>" id="inputMorada" name="morada" required></span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Codigo Postal:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="text" value="<?php if (isset($error)) echo $funcionario->codpostal ?>" class="form-control <?php if (isset($error) && $error['codpostal']) echo 'is-invalid' ?>" id="inputCodPostal" name="codpostal" required></span></div>
                                    <?php if (isset($error) && $error['codpostal']) { ?>
                                        <div class="row text-danger" style="display: flex; justify-content: center; align-items: center;"><?= $error['codpostal'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Localidade:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="text" value="<?php if (isset($error)) echo $funcionario->localidade ?>" class="form-control" id="inputLocalidade" name="localidade" required></span></div>
                                </div>
                            </div>
                            <input type="hidden" name="role" value="funcionario">
                            <input type="hidden" name="ativo" value=1>
                            <button type="submit" class="w-50 btn btn-dark mt-2">Criar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div> <!-- /row -->
</div> <!-- /row -->