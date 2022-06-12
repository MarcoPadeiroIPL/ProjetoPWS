<div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
    <span class="fs-3">Produtos</span>
</div>
<div class="row" style="height:95.3245%; background-color: #e8e8e9;">
    <div class="row" style="margin-top: 5%;">
        <div class="col-sm-12">
            <form action="router.php?c=fatura&a=pesquisar" method="POST">
                <input type="text" name="pesquisa" style="float:left; margin-bottom:2vh; width:15vw" placeholder="Pesquisar fatura" class="form-control bg-dark text-white">
                <input type="hidden" name="place" value="index">
                <button type="submit" style="float:left; margin-bottom:2vh;" class="btn btn-dark"><i class="bi bi-search"></i></button>
                <?php if ($pesquisa == true) { ?>
                    <a href="router.php?c=fatura&a=index" style="float:left; margin-bottom:2vh;">Limpar Pesquisa</a>
                <?php } ?>
            </form>
            <?php if ($role != 'cliente') { ?><a href="router.php?c=fatura&a=escolher"><button type="button" style="float:right; margin-bottom:2vh" class="btn bg-dark text-white">+ Nova Fatura</button></a><?php } ?>
            <table class="table table-stripped shadow">
                <thead class="table-dark">
                    <th style="border-radius: 10px 0 0 0;">
                        <h3>ID</h3>
                    </th>
                    <th>
                        <h3>Data</h3>
                    </th>
                    <th>
                        <h3>Hora</h3>
                    </th>
                    <th style="text-align: center;">
                        <h3>Estado</h3>
                    </th>
                    <th style="text-align: center;">
                        <h3>Cliente</h3>
                    </th>
                    <th style="text-align: center">
                        <h3>Funcionario</h3>
                    </th>
                    <th style="text-align: right;">
                        <h3>Valor total</h3>
                    </th>
                    <th style="text-align: right">
                        <h3>IVA total</h3>
                    </th>
                    <th style="border-radius: 0 10px 0 0;"></th>
                </thead>
                <tbody>
                    <?php foreach ($faturas as $fatura) { ?>
                        <tr>
                            <td><?= $fatura->id ?></td>
                            <td><?= date("d/m/Y", strtotime($fatura->data)) ?></td>
                            <td><?= date("H:i:s", strtotime($fatura->data)) ?></td>
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
                                    <a href="router.php?c=fatura&a=delete&id=<?= $fatura->id ?>" class="text-black" title="Apagar"><i class="fs-4 bi bi-trash"></i></a>
                                </td>
                            <?php }
                            if ($fatura->estado == 'em lancamento' && $role != 'cliente') { ?>
                                <td style="text-align: right; padding-right:2%">
                                    <a href="router.php?c=fatura&a=emitir&id=<?= $fatura->id ?>" class="text-black" title="Emitir"><i class="fs-4 bi bi-check-lg" title="Emitir"></i></a>
                                    <i class="fs-4 bi bi-eye text-secondary pl-2" title="Mostrar"></i>
                                    <a href="router.php?c=fatura&a=register&id=<?= $fatura->id ?>" class="text-black" title="Editar"><i class="fs-4 bi bi-pencil pl-2" title="Editar"></i></a>
                                    <a href="router.php?c=fatura&a=delete&id=<?= $fatura->id ?>" class="text-black" title="Apagar"><i class="fs-4 bi bi-trash"></i></a>
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