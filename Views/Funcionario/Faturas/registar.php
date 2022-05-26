<div class="container-fluid" >
    <div class="row">
        <div class="col" style="text-align:center;">Empresa xmpto</div>
    </div>
    <div class="row">
        <div class="col-4">
            <table class="table table-secondary">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Stock</th>
                    <th scope="col"></th>
                </thead>
                <tbody>
                    <?php foreach($produtos as $produto) { ?>
                    <form action="router.php?c=fatura&a=adicionarLinha" method="POST">
                        <tr>
                            <td><?=$produto->referencia?></td>
                            <td id="descricao<?=$produto->referencia?>"><?=$produto->descricao?></td>
                            <td ><input style="width:20%;" type="text" id="inputQuantidade<?=$produto->referencia?>" name="quantidade" value=1 required></td>
                            <td id="preco<?=$produto->referencia?>"><?=$produto->preco?></td>
                            <td id="stock<?=$produto->referencia?>"><?=$produto->stock?></td>
                            <td ><button type="submit" class="btn btn-primary">+</button></td>
                        </tr>   
                        <input type="hidden" name="valor" value="<?=$produto->preco?>">
                        <input type="hidden" name="valor_iva" value="<?=$produto->iva->percentagem?>">
                        <input type="hidden" name="produto_id" value="<?=$produto->referencia?>">
                        <input type="hidden" name="fatura_id" value="<?=$fatura->id?>">
                    </form>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
        <div class="col" id="fatura" style="background-color:lightgrey">
            <form action="router.php?c=fatura&a=emitir&id=<?=$fatura->id?>" method="POST">
            <h1>Linhas Fatura #<?=$fatura->id?></h1>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ref. Produto</th>
                        <th scope="col">Nome do Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor(unitario)</th>
                        <th scope="col">IVA</th>
                        <th scope="col">Preço Final</th>
                    </tr>
                </thead> 
                <tbody id="linhasFatura">
                    <?php $i = 0; foreach($fatura->linhas as $linha){ $i++;?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$linha->produto->referencia?></td>
                            <td><?=$linha->produto->descricao?></td>
                            <td><?=$linha->quantidade?></td>
                            <td><?=$linha->valor?></td>
                            <td><?=$linha->valor_iva?></td>
                            <td><?=$linha->valor * $linha->quantidade?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Preço Final</td>
                        <td id="precoFinal">0.00</td>
                    </tr>
                </tfoot>
            </table>
        </div> 
    </div>
    <div class="row"><button type="submit" class="btn btn-primary">Emitir</button></div>
    </form>
    <a href="router.php?c=home">Voltar atras</a>
</div>