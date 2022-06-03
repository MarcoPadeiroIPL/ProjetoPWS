    <div class="row min-wh-100 mt-0" style="    background-color:rgba(243,243,244,255);">
        <span class="fs-3">IVA</span>
    </div>
    <div class="row" style="height:95.3245%; background-color: #e8e8e9;">
        <div class="row" style="margin-top: 5%;">
            <div class="col-sm-12">
                <a href="router.php?c=fatura&a=escolher"><button type="button" style="position: absolute;top: 10.5%; left:92.7%; transform: translate(-50%, -50%);"class="btn btn-primary">+ Novo IVA</button></a>
                <table class="table table-stripped">
                    <thead class="table-dark">
                        <th style="border-radius: 10px 0 0 0;">
                        <h3>ID</h3></th>
                        <th><h3>Descrição</h3></th>
                        <th><h3>Percentagem</h3></th>
                        <th><h3>Vigor</h3></th>
                        <th style="border-radius: 0 10px 0 0;"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($ivas as $iva) { ?>
                        <tr>
                            <td><?=$iva->id?></td>
                            <td><?=$iva->descricao?></td>
                            <td><?=$iva->percentagem?>%</td>
                            <td><?php if($iva->vigor == 1){ echo 'Sim'; } else { echo 'Não'; }  ?></td>
                            <td>
                                <a href="router.php?c=iva&a=show&id=<?= $produto->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-eye"></i></a>
                                <a href="router.php?c=iva&a=edit&id=<?= $produto->id ?>" class="text-black" title="Mostrar"><i class="fs-4 bi bi-pencil" title="Editar"></i>
                                <a href="router.php?c=iva&a=delete&id=<?= $produto->id ?>" class="text-black" title="Apagar"><i class="fs-4 bi bi-trash"></i></a>
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
