
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
            <?php foreach ($clientes as $cliente) { ?>
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
                    <a href="router.php?c=cliente&a=show&id=<?= $cliente->id ?>" class="btn btn-info" role="button">Show</a>
                    <a href="router.php?c=cliente&a=edit&id=<?= $cliente->id ?>" class="btn btn-info" role="button">Edit</a>
                    <a href="router.php?c=cliente&a=delete&id=<?= $cliente->id ?>"  class="btn btn-warning" role="button">Delete</a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Create new cliente</h3>
        <p>
        <a href="router.php?c=cliente&a=create" class="btn btn-info"role="button">New</a>
        </p>
        <a href="router.php?c=dashboard&a=funcionario">Voltar atras</a>
    </div>
</div> <!-- /row -->