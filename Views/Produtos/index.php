    <div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
        <span class="fs-3">Produtos</span>
    </div>
    <div class="row" style="height:95.3245%; background-color: #e8e8e9;">
        <div class="row" style="margin-top: 5%;">
            <div class="col-sm-12">
                <form action="" method="GET">
                    <input type="text" name="pesquisa" style="float:left; margin-bottom:2vh; width:15vw" value="<?php if (isset($pesquisa)) echo $pesquisa; ?>" placeholder="Pesquisar produto" class="form-control bg-dark text-white">
                    <input type="hidden" name="place" value="index">
                    <input type="hidden" name="c" value="produto">
                    <input type="hidden" name="a" value="pesquisar">
                    <button type="submit" style="float:left; margin-bottom:2vh;" class="btn btn-dark"><i class="bi bi-search"></i></button>
                    <?php if (isset($pesquisa)) { ?>
                        <a href="router.php?c=produto&a=index" style="float:left; margin-bottom:2vh;">Limpar Pesquisa</a>
                    <?php } ?>
                </form>
                <a href="router.php?c=produto&a=create"><button type="button" style="float:right; margin-bottom:2vh" class="btn bg-dark text-white">+ Novo Produto</button></a>
                <table class="table table-stripped shadow">
                    <thead class="table-dark" style="position: sticky; top:0">
                        <th style="border-radius: 10px 0 0 0;">
                            <h3>Referencia</h3>
                        </th>
                        <th>
                            <a class="text-decoration-none text-white" href="router.php?c=produto&a=order&col=descricao&order=<?php if (!isset($descricao)) echo 'asc';
                                                                                                                                else if ($descricao == 'asc') echo 'desc';
                                                                                                                                else echo 'asc' ?>&pesquisa=<?php if (isset($pesquisa)) echo $pesquisa; ?>">
                                <h3>Descricao <?php if (isset($descricao)) { ?><i class="bi bi-caret-<?php if ($descricao == 'asc') echo 'up';
                                                                                                        else echo 'down'; ?>-fill fs-5"></i><?php } ?></h3>
                            </a>
                        </th>
                        <th>
                            <a class="text-decoration-none text-white" href="router.php?c=produto&a=order&col=preco&order=<?php if (!isset($preco)) echo 'asc';
                                                                                                                            else if ($preco == 'asc') echo 'desc';
                                                                                                                            else echo 'asc' ?>&pesquisa=<?php if (isset($pesquisa)) echo $pesquisa; ?>">
                                <h3>Preço <?php if (isset($preco)) { ?><i class="bi bi-caret-<?php if ($preco == 'asc') echo 'up';
                                                                                                else echo 'down'; ?>-fill fs-5"></i><?php } ?></h3>
                            </a>
                        </th>
                        <th>
                            <a class="text-decoration-none text-white" href="router.php?c=produto&a=order&col=stock&order=<?php if (!isset($stock)) echo 'asc';
                                                                                                                            else if ($stock == 'asc') echo 'desc';
                                                                                                                            else echo 'asc' ?>&pesquisa=<?php if (isset($pesquisa)) echo $pesquisa; ?>">
                                <h3>Stock <?php if (isset($stock)) { ?><i class="bi bi-caret-<?php if ($stock == 'asc') echo 'up';
                                                                                                else echo 'down'; ?>-fill fs-5"></i><?php } ?></h3>
                            </a>
                        </th>
                        <th>
                            <h3>IVA</h3>
                        </th>
                        <th>
                            <h3>IVA(%)</h3>
                            </a>
                        </th>
                        <th style="border-radius: 0 10px 0 0;"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto) { ?>
                            <?php if (!$produto->ativo) echo '<tr class="text-secondary">'; ?>
                            <?php if (isset($errors) && $errors == $produto->referencia) echo '<script>alert("Existem faturas associadas a este produto!");</script>'; ?>
                            <?php if ($produto->ativo && !isset($erros)) echo '<tr>'; ?>
                            <td><?= $produto->referencia ?></td>
                            <td><?= $produto->descricao ?></td>
                            <td><?= $produto->preco ?>€</td>
                            <td><?= $produto->stock ?></td>
                            <td><?= $produto->iva->descricao ?></td>
                            <td><?= $produto->iva->percentagem ?>%</td>
                            <td>
                                <?php if (!$produto->ativo) { ?>
                                    <a href="router.php?c=produto&a=activate&id=<?= $produto->id ?>" class="text-black" title="Ativar"><i class="fs-4 bi bi-check"></i></a>
                                <?php } ?>
                                <a href="router.php?c=produto&a=show&id=<?= $produto->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-eye"></i></a>
                                <a href="router.php?c=produto&a=edit&id=<?= $produto->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-pencil" title="Editar"></i></a>
                                <a onclick="return confirm('Tem a certeza que quer apagar?');" href="router.php?c=produto&a=delete&id=<?= $produto->id ?>" class="text-black" title="Apagar"><i class="fs-4 bi bi-trash"></i></a>
                            </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /row -->
    </div> <!-- /row -->