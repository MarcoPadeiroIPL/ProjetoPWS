    <div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
        <span class="fs-3">Produtos</span>
    </div>
    <div class="row" style="height:95.3245%; background-color: #e8e8e9;">
        <div class="row" style="margin-top: 5%;">
            <div class="col-sm-12">
                <a href="router.php?c=fatura&a=escolher"><button type="button" style="position: absolute;top: 10.5%; left:92.7%; transform: translate(-50%, -50%);"class="btn btn-primary">+ Novo Produto</button></a>
                <table class="table table-stripped">
                    <thead class="table-dark">
                        <th style="border-radius: 10px 0 0 0;"><h3>Referencia</h3></th>
                        <th><h3>Descrição</h3></th>
                        <th><h3>Preço</h3></th>
                        <th><h3>Stock</h3></th>
                        <th><h3>IVA</h3></th>
                        <th><h3>IVA %</h3></th>
                        <th style="border-radius: 0 10px 0 0;"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto) { ?>
                        <tr>
                            <td><?=$produto->referencia?></td>
                            <td><?=$produto->descricao?></td>
                            <td><?=$produto->preco?></td>
                            <td><?=$produto->stock?></td>
                            <td><?=$produto->iva->descricao?></td>
                            <td><?=$produto->iva->percentagem?>%</td>
                            <td>
                                <a href="router.php?c=produto&a=show&id=<?= $produto->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-eye"></i></a>
                                <a href="router.php?c=produto&a=edit&id=<?= $produto->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-pencil" title="Editar"></i>
                                <a href="router.php?c=produto&a=delete&id=<?= $produto->id ?>" class="text-black" title="Apagar"><i class="fs-4 bi bi-trash"></i></a>
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
