var idLinha = 1;
var linhas = [];
var precoFinal = 0;
function AdicionarLinha(id){
    var exists = 0;
    for(i = 1; i < linhas.length; i++){
        if(linhas[i].produto_id == id){exists = i;}
    }
    if(exists == 0){
        linhas[idLinha] = {
            id: idLinha,
            quantidade:document.getElementById('inputQuantidade' + id).value,
            descricao:document.getElementById('descricao' + id).innerHTML,
            valor:document.getElementById('preco' + id).innerHTML,
            valor_iva:document.getElementById('iva'+ id).value,
            fatura_id:document.getElementById('faturaID').value,
            produto_id:id 
        };
        idLinha++;
    } else {
        linhas[exists].quantidade = parseInt(linhas[exists].quantidade) + parseInt(document.getElementById('inputQuantidade' + id).value); 
    }
    ApresentarLinhas();
    document.getElementById('precoFinal').innerHTML = precoFinal + '€';
}
function ApresentarLinhas(){
    precoFinal = 0;
    document.getElementById('linhasFatura').innerHTML = '';
    for(i = 1; i < linhas.length; i++){
        document.getElementById('linhasFatura').innerHTML +=
            "<tr>" +
                "<td>"+linhas[i].id+"</td>" +
                "<td>"+linhas[i].produto_id+"</td>" +   
                "<td>"+linhas[i].descricao+"</td>" +   
                "<td>"+linhas[i].quantidade+"</td>" +  
                "<td>"+linhas[i].valor+"€</td>" +   
                "<td>"+linhas[i].valor_iva+"%</td>" +  
                "<td>"+linhas[i].valor * linhas[i].quantidade+"€</td>" +     
            "</tr>" +
            "<input type='hidden' name='linha["+i+"][quantidade]' value="+linhas[i].quantidade+">" +
            "<input type='hidden' name='linha["+i+"][valor]' value="+linhas[i].valor+">" +
            "<input type='hidden' name='linha["+i+"][valor_iva]' value="+linhas[i].valor_iva+">" +
            "<input type='hidden' name='linha["+i+"][produto_id]' value="+linhas[i].produto_id+">";
        precoFinal += linhas[i].valor * linhas[i].quantidade;
    } 
}