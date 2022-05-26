<h2 class="text-left top-space">Faturas Index</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th><h3>ID</h3></th>
                <th><h3>Data</h3></th>
                <th><h3>Valor total</h3></th>
                <th><h3>IVA total</h3></th>
                <th><h3>Estado</h3></th>
                <th><h3>Cliente</h3></th>
                <th><h3>Funcionario</h3></th>
                <th><h3>SHOW</h3></th>
            </thead>
            <tbody>
            <?php foreach ($faturas as $fatura) { ?>
            <tr>
                <td><?=$fatura->id?></td>
                <td><?=$fatura->data?></td>
                <td><?=$fatura->valortotal?></td>
                <td><?=$fatura->ivatotal?></td>
                <td><?=$fatura->estado?></td>
                <td><?=$fatura->cliente->username?></td>
                <td><?=$fatura->funcionario->username?></td>
                <?php if($fatura->estado == 'emitida') { ?>
                    <td><a href="router.php?c=fatura&a=show&id=<?= $fatura->id ?>"  class="btn btn-warning" role="button">Show</a></td>
                <?php } ?>
                <?php if($fatura->estado == 'em lancamento' && $role != 'cliente') { ?>
                    <td><a href="router.php?c=fatura&a=register&id=<?= $fatura->id ?>"  class="btn btn-primary" role="button">Edit</a></td>
                    <td><a href="router.php?c=fatura&a=emitir&id=<?= $fatura->id ?>"  class="btn btn-warning" role="button">Emitir</a></td>
                <?php } ?>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <a href="router.php?c=home">Voltar atras</a>
    </div>
</div> <!-- /row -->