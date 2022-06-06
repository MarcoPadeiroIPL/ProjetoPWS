    <div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
        <span class="fs-3">Funcionarios</span>
    </div>
    <div class="row" style="height:95.3245vh; background-color: #e8e8e9;">
        <div class="row" style="margin-top: 5rem;">
            <div class="col-sm-12">
                <form action="router.php?c=funcionario&a=pesquisar" method="POST">
                    <input type="text" name="pesquisa" style="float:left; margin-bottom:2vh; width:15vw" placeholder="Pesquisar funcionario" class="form-control bg-dark text-white">
                    <button type="submit" style="float:left; margin-bottom:2vh;" class="btn btn-dark"><i class="bi bi-search"></i></button>
                    <?php if($pesquisa == true){ ?>
                    <a href="router.php?c=funcionario&a=index" style="float:left; margin-bottom:2vh;">Limpar Pesquisa</a>
                    <?php } ?>
                </form>
                <a href="router.php?c=funcionario&a=create"><button type="button" style="float:right; margin-bottom:2vh"class="btn bg-dark text-white">+ Novo Funcionario</button></a>
                <table class="table table-stripped shadow">
                    <thead class="table-dark">
                        <th style="border-radius: 10px 0 0 0;"><h3>ID</h3></th>
                        <th><h3>Username</h3></th>
                        <th><h3>Email</h3></th>
                        <th><h3>Telefone</h3></th>
                        <th><h3>NIF</h3></th>
                        <th><h3>Morada</h3></th>
                        <th><h3>Codigo Postal</h3></th>
                        <th><h3>Localidade</h3></th>
                        <th style="border-radius: 0 10px 0 0;"></th>
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
                                <a href="router.php?c=funcionario&a=show&id=<?= $funcionario->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-eye"></i></a>
                                <a href="router.php?c=funcionario&a=register&id=<?= $funcionario->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-pencil pl-2" title="Editar"></i></a>
                                <a href="router.php?c=funcionario&a=delete&id=<?= $funcionario->id ?>" class="text-black" title="Apagar"><i class="fs-4 bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
            </div>
        </div> <!-- /row -->
    </div> <!-- /row -->