    <div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
        <span class="fs-3">IVA</span>
    </div>
    <div class="row" style="height:95.3245%; background-color: #e8e8e9;">
        <div class="row" style="margin-top: 5%;">
            <div class="col-sm-12">
                <form action="router.php?c=iva&a=pesquisar" method="POST">
                    <input type="text" name="pesquisa" style="float:left; margin-bottom:2vh; width:15vw" placeholder="Pesquisar IVA" class="form-control bg-dark text-white">
                    <button type="submit" style="float:left; margin-bottom:2vh;" class="btn btn-dark"><i class="bi bi-search"></i></button>
                    <?php if ($pesquisa == true) { ?>
                        <a href="router.php?c=iva&a=index" style="float:left; margin-bottom:2vh;">Limpar Pesquisa</a>
                    <?php } ?>
                </form>
                <a href="router.php?c=iva&a=create"><button type="button" style="float:right; margin-bottom:2vh" class="btn bg-dark text-white">+ Novo IVA</button></a>
                <table class="table table-stripped shadow">
                    <thead class="table-dark">
                        <th style="border-radius: 10px 0 0 0;">
                            <h3>ID</h3>
                        </th>
                        <th>
                            <h3>Descrição</h3>
                        </th>
                        <th style="text-align: right">
                            <h3>Percentagem</h3>
                        </th>
                        <th style="text-align: center;">
                            <h3>Vigor</h3>
                        </th>
                        <th style="border-radius: 0 10px 0 0;"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($ivas as $iva) { ?>
                            <tr>
                                <td><?= $iva->id ?></td>
                                <td><?= $iva->descricao ?></td>
                                <td style="text-align: right; width:10%"><?= $iva->percentagem ?>%</td>
                                <td style="text-align: center;"><?php if ($iva->vigor == 1) {
                                                                    echo 'Sim';
                                                                } else {
                                                                    echo 'Não';
                                                                }  ?></td>
                                <td style="text-align:right; padding-right:2%">
                                    <a href="router.php?c=iva&a=show&id=<?= $iva->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-eye"></i></a>
                                    <a href="router.php?c=iva&a=edit&id=<?= $iva->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-pencil" title="Editar"></i></a>
                                    <a href="router.php?c=iva&a=delete&id=<?= $iva->id ?>" class="text-black" title="Apagar"><i class="fs-4 bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /row -->
    </div> <!-- /row -->