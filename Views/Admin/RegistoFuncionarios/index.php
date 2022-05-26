
<h2 class="text-left top-space">Funcionario Index</h2>
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
            <?php foreach ($funcionarios as $funcionario) { ?>
            <tr>
                <td><?=$funcionario->id?></td>
                <td><?=$funcionario->username?></td>
                <td><?=$funcionario->email?></td>
                <td><?=$funcionario->telefone?></td>
                <td><?=$funcionario->nif?></td>
                <td><?=$funcionario->morada?></td>
                <td><?=$funcionario->codpostal?></td>
                <td><?=$funcionario->localidade?></td>
                <td>
                    <a href="router.php?c=funcionario&a=show&id=<?= $funcionario->id ?>" class="btn btn-info" role="button">Show</a>
                    <a href="router.php?c=funcionario&a=edit&id=<?= $funcionario->id ?>" class="btn btn-info" role="button">Edit</a>
                    <a href="router.php?c=funcionario&a=delete&id=<?= $funcionario->id ?>"  class="btn btn-warning" role="button">Delete</a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Create new funcionario</h3>
        <p>
        <a href="router.php?c=funcionario&a=create" class="btn btn-info"role="button">New</a>
        </p>
        <a href="router.php?c=dashboard&a=funcionario">Voltar atras</a>
    </div>
</div> <!-- /row -->