<div class="row min-wh-100 mt-0" style="background-color:rgba(243,243,244,255);">
    <span class="fs-3">Alterar email/password</span>
</div>
<div class="row" style="height:95.3245vh; background-color: #e8e8e9;">
    <div class="row" style="margin-top: 5rem;">
        <div class="col"><a href="router.php?c=user&a=show&id=<?= $id ?>"><i class="display-4 bi bi-arrow-left-circle"></i></a></div>
        <div class="col-6 shadow-lg" style="height: 25vh;">
            <div class="row">
                <div class="col-4 mt-5" style="display: flex; justify-content: center; align-items: center;">
                    <i class="display-1 bi bi-person-square"></i>
                </div>
                <div class="col">
                    <div class="row mt-5">
                        <form action="router.php?c=funcionario&a=updatePass&id=<?= $funcionario->id ?>" method="post" class="needs-validation row justify-content-center">
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Password:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="password" class="form-control" id="inputPassword" name="password"></span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3 text-start"><span class="fs-5">Email:</span></div>
                                <div class="col mb-2 text-end">
                                    <div class="row"><span class="fs-5"><input type="email" value="<?= $funcionario->email ?>" class="form-control <?php if (isset($error) && $error['email']) echo 'is-invalid' ?>" id="inputEmail" name="email" required></span></div>
                                    <?php if (isset($error) && $error['email']) { ?>
                                        <div class="row text-danger" style="display: flex; justify-content: center; align-items: center;"><?= $error['email'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <button type="submit" class="w-50 btn btn-dark mt-2">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div> <!-- /row -->