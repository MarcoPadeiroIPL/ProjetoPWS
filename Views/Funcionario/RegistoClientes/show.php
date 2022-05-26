<h2 class="text-left top-space">Cliente Index</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th><h3>ID</h3></th>
                <th><h3>Username</h3></th>
                <th><h3>Email</h3></th>
                <th><h3>Telefone</h3></th>
                <th><h3>NIF</h3></th>
                <th><h3>Morada</h3></th>
                <th><h3>Codigo Postal</h3></th>
                <th><h3>Localidade</h3></th>
                <th><h3>User actions</h3></th>
            </thead>
            <tbody>
                <tr>
                    <td><?=$cliente->id?></td>
                    <td><?=$cliente->username?></td>
                    <td><?=$cliente->email?></td>
                    <td><?=$cliente->telefone?></td>
                    <td><?=$cliente->nif?></td>
                    <td><?=$cliente->morada?></td>
                    <td><?=$cliente->codpostal?></td>
                    <td><?=$cliente->localidade?></td>
                    <td>
                        <a href="router.php?c=cliente&a=edit&id=<?= $cliente->id ?>" class="btn btn-info" role="button">Edit</a>
                        <a href="router.php?c=cliente&a=delete&id=<?= $cliente->id ?>"  class="btn btn-warning" role="button">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
        <table>
            <thead>
                <th><h3>ID</h3></th>
                <th><h3>Data</h3></th>
                <th><h3>Valor total</h3></th>
                <th><h3>IVA total</h3></th>
                <th><h3>Estado</h3></th>
                <th><h3>Cliente</h3></th>
                <th><h3>Funcionario</h3></th>
            </thead>
            <tbody>
                <?php var_dump($cliente->faturas); foreach($cliente->faturas as $fatura) { ?>
                    <td><?=$fatura->id?></td>
                    <td><?=$fatura->data?></td>
                    <td><?=$fatura->valortotal?></td>
                    <td><?=$fatura->ivatotal?></td>
                    <td><?=$fatura->estado?></td>
                    <td><?=$fatura->cliente_id?></td>
                    <td><?=$fatura->funcionario_id?></td>
                <?php } ?>

            </tbody>
        </table>
    <a href="router.php?c=cliente&a=index">Voltar atras</a>
</div> <!-- /row -->