
<h2 class="text-left top-space">Produto Index</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th><h3>Referencia</h3></th>
                <th><h3>Descrição</h3></th>
                <th><h3>Preço</h3></th>
                <th><h3>Stock</h3></th>
                <th><h3>IVA_ID</h3></th>
                <th><h3>User Actions</h3></th>
            </thead>
            <tbody>
            <tr>
                <td><?=$produto->referencia?></td>
                <td><?=$produto->descricao?></td>
                <td><?=$produto->preco?>€</td>
                <td><?=$produto->stock?></td>
                <td><?=$produto->iva_id?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <a href="router.php?c=produto&a=index">Voltar atras</a>
</div> <!-- /row -->