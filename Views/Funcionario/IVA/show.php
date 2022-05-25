
<h2 class="text-left top-space">Produto Index</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped"><thead><th><h3>Id</h3></th><th><h3>Descrição</h3></th><th><h3>Percentagem</h3></th><th><h3>Vigor</h3></th></thead>
            <tbody>
            <tr>
            <td><?=$iva->id?></td>
            <td><?=$iva->descricao?></td>
            <td><?=$iva->percentagem?></td>
            <td><?=$iva->vigor?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <a href="router.php?c=iva&a=index">Voltar atras</a>
</div> <!-- /row -->