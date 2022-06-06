    <div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
        <span class="fs-3">Produtos</span>
    </div>
    <div class="row" style="height:95.3245%; background-color: #e8e8e9;">
        <div class="row" style="margin-top: 5%;">
            <div class="col-sm-12">
                <form action="router.php?c=produto&a=pesquisar" method="POST">
                    <input type="text" name="pesquisa" style="float:left; margin-bottom:2vh; width:15vw" placeholder="Pesquisar produto" class="form-control bg-dark text-white">
                    <input type="hidden" name="place" value="index">
                    <button type="submit" style="float:left; margin-bottom:2vh;" class="btn btn-dark"><i class="bi bi-search"></i></button>
                    <?php if ($pesquisa == true) { ?>
                        <a href="router.php?c=produto&a=index" style="float:left; margin-bottom:2vh;">Limpar Pesquisa</a>
                    <?php } ?>
                </form>
                <a href="router.php?c=produto&a=create"><button type="button" style="float:right; margin-bottom:2vh" class="btn bg-dark text-white">+ Nova Produto</button></a>
                <table class="table table-stripped shadow">
                    <thead class="table-dark" style="position: sticky; top:0">
                        <th style="border-radius: 10px 0 0 0;">
                            <h3>Referencia</h3>
                        </th>
                        <th>
                            <h3>Descrição</h3>
                        </th>
                        <th>
                            <h3>Preço</h3>
                        </th>
                        <th>
                            <h3>Stock</h3>
                        </th>
                        <th>
                            <h3>IVA</h3>
                        </th>
                        <th>
                            <h3>IVA %</h3>
                        </th>
                        <th style="border-radius: 0 10px 0 0;"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto) { ?>
                            <tr>
                                <td><?= $produto->referencia ?></td>
                                <td><?= $produto->descricao ?></td>
                                <td><?= $produto->preco ?>€</td>
                                <td><?= $produto->stock ?></td>
                                <td><?= $produto->iva->descricao ?></td>
                                <td><?= $produto->iva->percentagem ?>%</td>
                                <td>
                                    <a href="router.php?c=produto&a=show&id=<?= $produto->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-eye"></i></a>
                                    <a href="router.php?c=produto&a=edit&id=<?= $produto->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-pencil" title="Editar"></i></a>
                                    <a href="router.php?c=produto&a=delete&id=<?= $produto->id ?>" class="text-black" title="Apagar"><i class="fs-4 bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /row -->
    </div> <!-- /row -->