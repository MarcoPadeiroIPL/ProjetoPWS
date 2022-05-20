    <div class="container">
        <h2>Create IVA</h2>
        <form action="router.php?c=produto&a=store" method="post" class="needs-validation row justify-content-center" novalidate>
            <div class="col col-6">
                <div class="mb-3">
                    <label for="inputDescricao" class="form-label">Descrição:</label>
                    <input type="text" class="form-control" id="inputDescricao" name="descricao" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPreco" class="form-label">Preço:</label>
                    <input type="text" class="form-control" id="inputPreco" name="preco" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPreco" class="form-label">Stock:</label>
                    <input type="text" class="form-control" id="inputStock" name="stock" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputIVA_ID" class="form-label">IVA ID:</label>
                    <input type="text" class="form-control" id="inputIVA_ID" name="iva_id" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Criar</button>
                <a href="router.php?c=iva&a=index">Voltar atras</a>
            </div>
        </form>
    </div>
    