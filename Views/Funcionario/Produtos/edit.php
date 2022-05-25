
    <div class="container">
        <h2>Edit Produto</h2>
        <form action="router.php?c=produto&a=update&id=<?=$produto->referencia?>" method="post" class="needs-validation row justify-content-center" novalidate>
            <div class="col col-6">
                <div class="mb-3">
                    <label for="inputDescricao" class="form-label">Descrição:</label>
                    <input type="text" class="form-control" id="inputDescricao" name="descricao" value="<?=$produto->descricao?>" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPreco" class="form-label">Preço:</label>
                    <input type="text" class="form-control" id="inputPreco" name="preco" value="<?=$produto->preco?>"required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPreco" class="form-label">Stock:</label>
                    <input type="text" class="form-control" id="inputStock" name="stock" value="<?=$produto->stock?>"required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputIVA_ID" class="form-label">IVA ID:</label>
                    <input type="text" class="form-control" id="inputIVA_ID" name="iva_id" value="<?=$produto->iva_id?>"required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Editar</button>
                <a href="router.php?c=produto&a=index">Voltar atras</a>
            </div>
        </form>
    </div>
    