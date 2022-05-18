
    <div class="container">
        <h2>Edit IVA</h2>
        <form action="router.php?c=iva&a=update&id=<?=$iva->id?>" method="post" class="needs-validation row justify-content-center" novalidate>
            <div class="col col-6">
                <div class="mb-3">
                    <label for="inputDescricao" class="form-label">Descrição:</label>
                    <input type="text" class="form-control" id="inputDescricao" name="descricao" value="<?=$iva->descricao?>" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPercentagem" class="form-label">Percentagem:</label>
                    <input type="text" class="form-control" id="inputPercentagem" name="percentagem" value="<?=$iva->percentagem?>"required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputVigor" class="form-label">Em vigor:</label>
                    <select name="vigor" id="inputVigor" class="form-control">
                        <option value="1"<?php if($iva->vigor == 0){ echo 'selected'; }?>>Sim</option>
                        <option value="0"<?php if($iva->vigor == 0){ echo 'selected'; }?>>Não</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Editar</button>
                <a href="router.php?c=iva&a=index">Voltar atras</a>
            </div>
        </form>
    </div>
    