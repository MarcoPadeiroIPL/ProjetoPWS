
<h2 class="text-left top-space">Produtos Index</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th><h3>Referencia</h3></th>
                <th><h3>Descrição</h3></th>
                <th><h3>Preço</h3></th>
                <th><h3>Stock</h3></th>
                <th><h3>IVA</h3></th>
                <th><h3>IVA %</h3></th>
                <th><h3>User Actions</h3></th>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td><?=$produto->referencia?></td>
                    <td><?=$produto->descricao?></td>
                    <td><?=$produto->preco?></td>
                    <td><?=$produto->stock?></td>
                    <td><?=$produto->iva->descricao?></td>
                    <td><?=$produto->iva->percentagem?>%</td>
                    <td>
                        <a href="router.php?c=produto&a=show&id=<?= $produto->referencia ?>" class="btn btn-info" role="button">Show</a>
                        <a href="router.php?c=produto&a=edit&id=<?= $produto->referencia ?>" class="btn btn-info" role="button">Edit</a>
                        <a href="router.php?c=produto&a=delete&id=<?= $produto->referencia ?>"  class="btn btn-warning" role="button">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Create new produto</h3>
        <p>
        <a href="router.php?c=produto&a=create" class="btn btn-info"role="button">New</a>
        </p>
        <a href="router.php?c=dashboard&a=funcionario">Voltar atras</a>
    </div>
</div> <!-- /row -->