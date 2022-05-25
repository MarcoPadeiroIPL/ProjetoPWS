<div class="container-fluid" style="width:874px; border: 1px solid black;">
    <div class="row" style="padding:30px">
        <div class="col-2" style="display: table;">
            <div style="display:table-cell; vertical-align:middle;">
                <h1>Fatura</h1>
            </div>
        </div>
        <div class="col-7"></div>
        <div class="col" >
            <div class="row" style="text-align:right;"><span>Nome empresa</span></div>
            <div class="row" style="text-align:right;"><span>Morada</span></div>
            <div class="row" style="text-align:right;"><span>Cod.Postal, Localidade</span></div>
            <div class="row" style="text-align:right;"><span>Email, telefone</span></div>
            <div class="row" style="text-align:right;"><span>NIF</span></div>
        </div>
    </div>
    <div class="row" style="padding-left:30px; padding-right:30px">
        <div class="col">
            <div class="row"><h4>CLIENTE</h4></div>
            <div class="row"><?=User::find([$fatura->cliente_id])->username?></div>
            <div class="row"><?=User::find([$fatura->cliente_id])->morada?></div>
            <div class="row"><?=User::find([$fatura->cliente_id])->codpostal?>, <?=User::find([$fatura->cliente_id])->localidade?></div>
            <div class="row"><?=User::find([$fatura->cliente_id])->email?>, <?=User::find([$fatura->cliente_id])->telefone?></div>
            <div class="row">NIF: <?=User::find([$fatura->cliente_id])->nif?></div>         
        </div>
        <div class="col" style="display: table;">
            <div style="display:table-cell; vertical-align:middle; text-align:center">
                Fatura #<?=$fatura->id?>
            </div>
        </div>
        <div class="col" style="display: table;">
            <div style="display:table-cell; vertical-align:middle;">
                Data de emissão: <?=$fatura->data?>
            </div>
        </div>
    </div>
    <div class="row" style="padding:30px"> 
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço unidade</th>
                    <th scope="col">IVA(%)</th>
                    <th scope="col">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($linhas as $linha) { ?>
                <tr>
                    <td><?=Produto::find([$linha->produto_id])->descricao?></td>
                    <td><?=$linha->quantidade?></td>
                    <td><?=Produto::find([$linha->produto_id])->preco?>€</td>
                    <td><?=Iva::find([Produto::find([$linha->produto_id])->iva_id])->percentagem?>%</td>
                    <td><?=(float)Produto::find([$linha->produto_id])->preco * (int)$linha->quantidade?>€</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>