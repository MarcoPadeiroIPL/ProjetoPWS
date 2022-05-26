        <div class="container">
        <h2>Edit Funcionario</h2>
        <form action="router.php?c=funcionario&a=update&id=<?=$funcionario->id?>" method="post" class="needs-validation row justify-content-center" novalidate>
            <div class="col col-6">
                <input type="hidden" name="username" value="<?=$funcionario->username?>">
                <input type="hidden" name="telefone" value="<?=$funcionario->telefone?>">
                <input type="hidden" name="nif" value="<?=$funcionario->nif?>">
                <input type="hidden" name="morada" value="<?=$funcionario->morada?>">
                <input type="hidden" name="codpostal" value="<?=$funcionario->codpostal?>">
                <input type="hidden" name="localidade" value="<?=$funcionario->localidade?>">
                <input type="hidden" name="role" value="<?=$funcionario->role?>">
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="inputEmail" name="email" value="<?=$funcionario->email?>" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="inputPassword" name="password">
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Editar</button>
                <a href="router.php?c=home">Voltar atras</a>
            </div>
        </form>
    </div>
    