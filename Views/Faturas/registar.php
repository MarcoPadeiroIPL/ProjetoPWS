<div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
    <span class="fs-3">Fatura</span>
</div>
<div class="row" style="height:95.3245%; background-color: #e8e8e9;">
    <div class="row" style="margin-top: 5%;">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-5">
                    <form action="router.php?c=fatura&a=pesquisarProduto" method="POST">
                        <input type="text" name="pesquisa" style="float:left; margin-bottom:2vh; width:15vw" value="<?php if (isset($pesquisa)) echo $pesquisa ?>" placeholder="Pesquisar produto" class="form-control bg-dark text-white">
                        <button type="submit" style="float:left; margin-bottom:2vh;" class="btn btn-dark"><i class="bi bi-search"></i></button>
                        <input type="hidden" name="fatura_id" value="<?= $fatura->id ?>">
                        <?php if (isset($pesquisa)) { ?>
                            <a href="router.php?c=fatura&a=register&id=<?= $fatura->id ?>" style="float:left; margin-bottom:2vh;">Limpar Pesquisa</a>
                        <?php } ?>
                    </form>
                    <table class="table table-stripped shadow">
                        <thead class="table-dark">
                            <th style="border-radius: 10px 0 0 0;">
                                <h3>#</h3>
                            </th>
                            <th>
                                <h3>Nome</h3>
                            </th>
                            <th>
                                <h3>Qnt.</h3>
                            </th>
                            <th class="text-end">
                                <h3>Valor</h3>
                            </th>
                            <th class="text-end">
                                <h3>Stock</h3>
                            </th>
                            <th style="border-radius: 0 10px 0 0;"></th>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos as $produto) { ?>
                                <form action="router.php?c=fatura&a=adicionarLinha" method="POST">
                                    <tr>
                                        <td><?= $produto->referencia ?></td>
                                        <td class="w-25"><?= $produto->descricao ?></td>
                                        <td class="text-center"><input class="form-control bg-dark text-white text-center <?php if (isset($stockInsuficiente) && $produto->referencia == $stockInsuficiente) echo 'is-invalid'; ?>" style="width:3vw;" name="quantidade" type="text" value=1 required></td>
                                        <td style="padding-left:2rem;" class="text-end"><?= $produto->preco ?>€</td>
                                        <td style="padding-left:2rem;" class="text-end"><?= $produto->stock ?></td>
                                        <td style="padding-left:2rem;"><button type="submit" class="btn btn-dark">Adicionar</button></td>
                                    </tr>
                                    <input type="hidden" name="valor" value="<?= $produto->preco ?>">
                                    <input type="hidden" name="valor_iva" value="<?= $produto->iva->percentagem ?>">
                                    <input type="hidden" name="produto_id" value="<?= $produto->referencia ?>">
                                    <input type="hidden" name="fatura_id" value="<?= $fatura->id ?>">
                                </form>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-1"></div>
                <div class="col">
                    <form action="router.php?c=fatura&a=emitir&id=<?= $fatura->id ?>" method="POST">
                        <p class="display-5">Fatura #<?= $fatura->id ?></p>
                        <table class="table table-stripped shadow-lg">
                            <thead class="table-dark">
                                <th style="border-radius: 10px 0 0 0;">
                                    <h3>Ref.</h3>
                                </th>
                                <th>
                                    <h3>Nome</h3>
                                </th>
                                <th>
                                    <h3>Qnt.</h3>
                                </th>
                                <th class="text-end">
                                    <h3>Preço</h3>
                                </th>
                                <th class="text-end">
                                    <h3>IVA(%)</h3>
                                </th>
                                <th class="text-end">
                                </th>
                                <th style="border-radius: 0 10px 0 0;"></th>
                            </thead>
                            <tbody>
                                <?php foreach ($fatura->linhas as $linha) { ?>
                                    <tr>
                                        <td><?= $linha->produto->referencia ?></td>
                                        <td><?= $linha->produto->descricao ?></td>
                                        <td class="text-center"><?= $linha->quantidade ?></td>
                                        <td class="text-center"><?= $linha->valor ?>€</td>
                                        <td class="text-center"><?= $linha->valor_iva ?>%</td>
                                        <td class="text-center"><a href="router.php?c=fatura&a=removerLinha&id=<?= $linha->id ?>"><i class="bi bi-trash fs-5"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <button type="submit" class="w-100 btn bg-dark text-white">Emitir</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /row -->
</div> <!-- /row -->