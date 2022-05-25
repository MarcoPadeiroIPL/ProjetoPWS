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
                    <input type="hidden" value=<?=$fatura->id?> id="faturaID"></input>
                    <?php foreach($produtos as $produto) { ?>
                    <tr>
                        <td><?=$produto->referencia?></td>
                        <td id="descricao<?=$produto->referencia?>"><?=$produto->descricao?></td>
                        <td ><input style="width:20%;" type="text" id="inputQuantidade<?=$produto->referencia?>" name="quantidade" value=1 required></td>
                        <td id="preco<?=$produto->referencia?>"><?=$produto->preco?></td>
                        <td id="stock<?=$produto->referencia?>"><?=$produto->stock?></td>
                        <input type="hidden" value=<?=$produto->iva->percentagem?> id="iva<?=$produto->referencia?>"></input>
                        <td ><button class="btn btn-primary" onclick="AdicionarLinha(<?=$produto->referencia?>)">+</button></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
        <div class="col" id="fatura" style="background-color:lightgrey">
            <form action="router.php?c=fatura&a=emitir" method="POST">
            <input type='hidden' value="<?=$fatura->id?>" name="fatura_id">
            <h1>Linhas Fatura <?=$fatura->id?></h1>
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
    <div class="row"><button type="submit" class="btn">emitir</div>
    </form>
</div>
<script src="Views/Funcionario/Faturas/teste.js"></script>