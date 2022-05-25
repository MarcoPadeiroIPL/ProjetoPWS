<h2>Choose a cliente</h2>
<form action="router.php?c=fatura&a=escolher" method="POST">
    <select name="clienteID" id="inputClienteID" class="form-control">
        <?php foreach($clientes as $cliente) { ?>
        <option value="<?=$cliente->id?>"><?=$cliente->username?></option>  
        <?php } ?>
    </select>
    <button type="submit" class="btn btn-primary">Selecionar</button>
    <a href="router.php?c=dashboard&a=funcionario">Voltar atras</a>
</form