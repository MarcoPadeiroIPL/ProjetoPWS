    <div class="row min-wh-100 mt-0" style="background-color:rgba(243,243,244,255);">
        <span class="fs-3">Funcionarios</span>
    </div>
    <div class="row" style="height:95.3245vh; background-color: #e8e8e9;">
        <div class="row" style="margin-top: 5rem;">
            <div class="col"><a href="router.php?c=funcionario&a=index"><i class="display-4 bi bi-arrow-left-circle"></i></a></div>
            <div class="col-6 shadow-lg" style="height:35vh;">
                <div class="row">
                    <div class="col-4 mt-5" style="display: flex; justify-content: center; align-items: center;">
                        <i class="display-1 bi bi-person-square"></i>
                    </div>
                    <div class="col">
                        <div class="row mt-5">
                            <div class="col-4">
                                <div class="row mb-3 text-start"><span class="fs-5">Username:</span></div>
                                <div class="row mb-3 text-start"><span class="fs-5">Email:</span></div>
                                <div class="row mb-3 text-start"><span class="fs-5">Telefone:</span></div>
                                <div class="row mb-3 text-start"><span class="fs-5">NIF:</span></div>
                                <div class="row mb-3 text-start"><span class="fs-5">Morada:</span></div>
                                <div class="row mb-3 text-start"><span class="fs-5">Codigo Postal:</span></div>
                                <div class="row mb-3 text-start"><span class="fs-5">Localidade:</span></div>
                            </div>
                            <div class="col">
                                <form action="router.php?c=funcionario&a=store" method="post" class="needs-validation row justify-content-center">
                                    <div class="row mb-2 text-end"><span class="fs-5"><input type="text" class="form-control" id="inputUsername" name="descricao" required></span></div>
                                    <div class="row mb-2 text-end"><span class="fs-5"><input type="text" class="form-control" id="inputPassword" name="preco" required></span></div>
                                    <div class="row mb-2 text-end"><span class="fs-5"><input type="text" class="form-control" id="inputTelefone" name="stock" required></span></div>
                                    <div class="row mb-2 text-end"><span class="fs-5"><input type="text" class="form-control" id="inputNIF" name="stock" required></span></div>
                                    <div class="row mb-2 text-end"><span class="fs-5"><input type="text" class="form-control" id="inputMorada" name="stock" required></span></div>
                                    <div class="row mb-2 text-end"><span class="fs-5"><input type="text" class="form-control" id="inputCodigoPostal" name="stock" required></span></div>
                                    <div class="row mb-2 text-end"><span class="fs-5"><input type="text" class="form-control" id="inputLocalidade" name="stock" required></span></div>
                                    <button type="submit" class="btn btn-dark mt-2">Criar</button>
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