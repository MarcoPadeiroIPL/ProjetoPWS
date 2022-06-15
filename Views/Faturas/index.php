<div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
    <span class="fs-3">Fatura</span>
</div>
<div class="row" style="height:95.3245%; background-color: #e8e8e9;">
    <div class="row" style="margin-top: 5%;">
        <div class="col-sm-12">
            <form action="" method="GET">
                <input type="text" name="pesquisa" style="float:left; margin-bottom:2vh; width:15vw" value="<?php if (isset($pesquisa)) echo $pesquisa; ?>" placeholder="Pesquisar fatura" class="form-control bg-dark text-white">
                <button type="submit" style="float:left; margin-bottom:2vh;" class="btn btn-dark"><i class="bi bi-search"></i></button>
                <?php if (isset($pesquisa)) { ?>
                    <a href="router.php?c=fatura&a=index" style="float:left; margin-bottom:2vh;">Limpar Pesquisa</a>
                <?php } ?>
                <input type="hidden" name="c" value="fatura">
                <input type="hidden" name="a" value="pesquisar">
            </form>
            <?php if ($role != 'cliente') { ?><a href="router.php?c=fatura&a=escolher"><button type="button" style="float:right; margin-bottom:2vh" class="btn bg-dark text-white">+ Nova Fatura</button></a><?php } ?>
            <table class="table table-stripped shadow">
                <thead class="table-dark">
                    <th style="border-radius: 10px 0 0 0;">
                        <h3>ID</h3>
                    </th>
                    <th>
                        <a class="text-decoration-none text-white" href="router.php?c=fatura&a=order&col=data&order=<?php if (!isset($data)) echo 'asc';
                                                                                                                    else if ($data == 'asc') echo 'desc';
                                                                                                                    else echo 'asc' ?>&pesquisa=<?php if (isset($pesquisa)) echo $pesquisa; ?>">
                            <h3>Data <?php if (isset($data)) { ?><i class="bi bi-caret-<?php if ($data == 'asc') echo 'up';
                                                                                        else echo 'down'; ?>-fill fs-5"></i><?php } ?></h3>
                        </a>
                    </th>
                    <th style="text-align: center;">
                        <a class="text-decoration-none text-white" href="router.php?c=fatura&a=order&col=estado&order=<?php if (!isset($estado)) echo 'asc';
                                                                                                                        else if ($estado == 'asc') echo 'desc';
                                                                                                                        else echo 'asc' ?>&pesquisa=<?php if (isset($pesquisa)) echo $pesquisa; ?>">
                            <h3>Estado <?php if (isset($estado)) { ?><i class="bi bi-caret-<?php if ($estado == 'asc') echo 'up';
                                                                                            else echo 'down'; ?>-fill fs-5"></i><?php } ?></h3>
                        </a>
                    </th>
                    <th style="text-align: center;">
                        <a class="text-decoration-none text-white" href="router.php?c=fatura&a=order&col=cliente_id&order=<?php if (!isset($cliente_id)) echo 'asc';
                                                                                                                            else if ($cliente_id == 'asc') echo 'desc';
                                                                                                                            else echo 'asc' ?>&pesquisa=<?php if (isset($pesquisa)) echo $pesquisa; ?>">
                            <h3>Cliente <?php if (isset($cliente_id)) { ?><i class="bi bi-caret-<?php if ($cliente_id == 'asc') echo 'up';
                                                                                                else echo 'down'; ?>-fill fs-5"></i><?php } ?></h3>
                        </a>
                    </th>
                    <th style="text-align: center">
                        <a class="text-decoration-none text-white" href="router.php?c=fatura&a=order&col=funcionario_id&order=<?php if (!isset($funcionario_id)) echo 'asc';
                                                                                                                                else if ($funcionario_id == 'asc') echo 'desc';
                                                                                                                                else echo 'asc' ?>&pesquisa=<?php if (isset($pesquisa)) echo $pesquisa; ?>">
                            <h3>Funcionario <?php if (isset($funcionario_id)) { ?><i class="bi bi-caret-<?php if ($funcionario_id == 'asc') echo 'up';
                                                                                                        else echo 'down'; ?>-fill fs-5"></i><?php } ?></h3>
                        </a>
                    </th>
                    <th style="text-align: right; width:12%">
                        <a class="text-decoration-none text-white" href="router.php?c=fatura&a=order&col=valorTotal&order=<?php if (!isset($valorTotal)) echo 'asc';
                                                                                                                            else if ($valorTotal == 'asc') echo 'desc';
                                                                                                                            else echo 'asc' ?>&pesquisa=<?php if (isset($pesquisa)) echo $pesquisa; ?>">
                            <h3>Valor Total <?php if (isset($valorTotal)) { ?><i class="bi bi-caret-<?php if ($valorTotal == 'asc') echo 'up';
                                                                                                    else echo 'down'; ?>-fill fs-5"></i><?php } ?></h3>
                        </a>
                    </th>
                    <th style="text-align: right">
                        <a class="text-decoration-none text-white" href="router.php?c=fatura&a=order&col=ivaTotal&order=<?php if (!isset($ivaTotal)) echo 'asc';
                                                                                                                        else if ($ivaTotal == 'asc') echo 'desc';
                                                                                                                        else echo 'asc' ?>&pesquisa=<?php if (isset($pesquisa)) echo $pesquisa; ?>">
                            <h3>IVA Total <?php if (isset($ivaTotal)) { ?><i class="bi bi-caret-<?php if ($ivaTotal == 'asc') echo 'up';
                                                                                                else echo 'down'; ?>-fill fs-5"></i><?php } ?></h3>
                        </a>
                    </th>
                    <th style="border-radius: 0 10px 0 0;"></th>
                </thead>
                <tbody>
                    <?php foreach ($faturas as $fatura) { ?>
                        <tr>
                            <td><?= $fatura->id ?></td>
                            <td><?= date("d/m/Y", strtotime($fatura->data)) ?></td>
                            <td style="text-align: center;"><?= $fatura->estado ?></td>
                            <td style="text-align: center;"><?= $fatura->cliente->username ?></td>
                            <td style="text-align: center;"><?= $fatura->funcionario->username ?></td>
                            <td style="text-align: right; width:10%"><?= $fatura->valortotal ?>€</td>
                            <td style="text-align:right; width:10%"><?= $fatura->ivatotal ?>€</td>
                            <?php if ($fatura->estado == 'emitida' && $role != 'cliente') { ?>
                                <td style="text-align: right; padding-right:2%">
                                    <i class="fs-4 text-secondary bi bi-check-lg" title="Emitir"></i>
                                    <a href="router.php?c=fatura&a=show&id=<?= $fatura->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-eye"></i></a>
                                    <i class="fs-4 bi bi-pencil text-secondary pl-2" title="Editar"></i>
                                    <a onclick="return confirm('Tem a certeza que quer apagar?');" href="router.php?c=fatura&a=delete&id=<?= $fatura->id ?>" class="text-black" title="Apagar"><i class="fs-4 bi bi-trash"></i></a>
                                </td>
                            <?php }
                            if ($fatura->estado == 'em lancamento' && $role != 'cliente') { ?>
                                <td style="text-align: right; padding-right:2%">
                                    <a href="router.php?c=fatura&a=emitir&id=<?= $fatura->id ?>" class="text-black" title="Emitir"><i class="fs-4 bi bi-check-lg" title="Emitir"></i></a>
                                    <i class="fs-4 bi bi-eye text-secondary pl-2" title="Mostrar"></i>
                                    <a href="router.php?c=fatura&a=register&id=<?= $fatura->id ?>" class="text-black" title="Editar"><i class="fs-4 bi bi-pencil pl-2" title="Editar"></i></a>
                                    <a onclick="return confirm('Tem a certeza que quer apagar?');" href="router.php?c=fatura&a=delete&id=<?= $fatura->id ?>" class="text-black" title="Apagar"><i class="fs-4 bi bi-trash"></i></a>
                                </td>
                            <?php }
                            if ($role == 'cliente') { ?>
                                <td>
                                    <a href="router.php?c=fatura&a=show&id=<?= $fatura->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-eye"></i></a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /row -->
</div> <!-- /row -->