<style>
    .col-ref{
        width:7%;
        text-align: right;
    }
    .col-descricao{
        width:43%;
    }
    .col-quantidade{
        width:10%;
        text-align: right;
    }
    .col-preco{
        width:15%;
        text-align: right;
    }
    .col-iva{
        width:10%;   
        text-align: right;
    }
    .col-total{
        width:15%;
        text-align: right;
    }
    .row-vazio td{
        border: none;
    }
</style>
<div class="container-fluid shadow-lg" style="width:874px; border: 1px solid black;">
    <div class="row" style="padding:30px">
        <div class="col-2" style="display: table;">
            <div style="display:table-cell; vertical-align:middle;">
                <h1>Fatura</h1>
            </div>
        </div>
        <div class="col-7"></div>
        <div class="col" >
            <div class="row" style="text-align:right;"><span><?=$empresa->designsocial?></span></div>
            <div class="row" style="text-align:right;"><span><?=$empresa->morada?></span></div>
            <div class="row" style="text-align:right;"><span><?=$empresa->codpostal?>, <?=$empresa->localidade?></span></div>
            <div class="row" style="text-align:right;"><span><?=$empresa->email?>, tlf: <?=$empresa->telefone?></span></div>
            <div class="row" style="text-align:right;"><span>NIF: <?=$empresa->nif?></span></div>
        </div>
    </div>
    <div class="row" style="padding-left:30px; padding-right:30px">
        <div class="col">
            <div class="row"><h4>CLIENTE</h4></div>
            <div class="row"><?=$fatura->cliente->username?></div>
            <div class="row"><?=$fatura->cliente->morada?></div>
            <div class="row"><?=$fatura->cliente->codpostal?>, <?=$fatura->cliente->localidade?></div>
            <div class="row"><?=$fatura->cliente->email?>, <?=$fatura->cliente->telefone?></div>
            <div class="row">NIF: <?=$fatura->cliente->nif?></div>         
        </div>
        <div class="col" style="display: table;">
            <div style="display:table-cell; vertical-align:middle; text-align:center">
                Fatura #<?=$fatura->id?>
            </div>
        </div>
        <div class="col" style="display: table;">
            <div style="display:table-cell; vertical-align:middle;">
                Data de emissão: <?=date("d/m/Y", strtotime($fatura->data))?>
            </div>
        </div>
    </div>
    <div class="row" style="padding:30px"> 
        <table class="table">
            <thead>
                <tr>
                    <th class="col-ref"scope="col">Ref.</th>
                    <th class="col-descricao" scope="col">Descrição</th>
                    <th class="col-quantidade"scope="col">Qt.</th>
                    <th class="col-preco"scope="col">€/UNID.</th>
                    <th class="col-iva"scope="col">IVA(%)</th>
                    <th class="col-total" scope="col">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fatura->linhas as $linha) { ?>
                <tr>
                    <td class="col-ref"><?=$linha->produto->referencia; ?></td>
                    <td class="col-descricao"><?=$linha->produto->descricao; ?></td>
                    <td class="col-quantidade"><?=$linha->quantidade?></td>
                    <td class="col-preco"><?=number_format((float)$linha->produto->preco, 2, '.', '')?>€</td>
                    <td class="col-iva"><?=$linha->produto->iva->percentagem?>%</td>
                    <td class="col-total"><?=number_format((float)$linha->produto->preco * $linha->quantidade, 2, '.', '')?>€</td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr class="row-vazio">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="col-preco">Subtotal</td>
                    <td></td>
                    <td class="col-total"><?=number_format((float)$fatura->valortotal - (float)$fatura->ivatotal, 2, '.', '')?>€</td>
                </tr>
                <tr class="row-vazio">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="col-preco">IVA</td>
                    <td></td>
                    <td class="col-total"><?=number_format((float)$fatura->ivatotal, 2, '.', '')?>€</td>
                </tr>
                <tr class="row-vazio">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="col-preco"><h5>TOTAL</h5></td>
                    <td></td>
                    <td class="col-total"><h5><?=number_format((float)$fatura->valortotal, 2, '.', '')?>€</h5></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="row" style="padding:30px;" >
        <div class="col-8"></div>
        <div class="col">
            <div class="row"><h4>Funcionario:</h4></div>
            <div class="row"><?=$fatura->funcionario->username?>#<?=$fatura->funcionario->id?></div>
            <div class="row"><?=$fatura->funcionario->email?> | <?=$fatura->funcionario->telefone?></div>
        </div>
    </div>
</div>
<a href="router.php?c=home">Voltar Atrás</a>