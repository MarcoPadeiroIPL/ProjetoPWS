    <div class="container">
        <h2>Create IVA</h2>
        <form action="router.php?c=cliente&a=store" method="post" class="needs-validation row justify-content-center" novalidate>
            <div class="col col-6">
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="inputUsername" name="username" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">E-mail:</label>
                    <input type="text" class="form-control" id="inputEmail" name="email" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputTelefone" class="form-label">Telefone:</label>
                    <input type="text" class="form-control" id="inputTelefone" name="telefone" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputNIF" class="form-label">NIF:</label>
                    <input type="text" class="form-control" id="inputNIF" name="NIF" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputMorada" class="form-label">Morada:</label>
                    <input type="text" class="form-control" id="inputMorada" name="morada" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputCodPostal" class="form-label">Codigo Postal:</label>
                    <input type="text" class="form-control" id="inputCodPostal" name="codPostal" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputLocalidade" class="form-label">Localidade:</label>
                    <input type="text" class="form-control" id="inputLocalidade" name="localidade" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <input type="hidden" class="form-control" name="role" value="cliente">
                <input type="hidden" class="form-control" name="ativo" value="1">
                <button type="submit" class="btn btn-primary">Criar</button>
                <a href="router.php?c=cliente&a=index">Voltar atras</a>
            </div>
        </form>
    </div>