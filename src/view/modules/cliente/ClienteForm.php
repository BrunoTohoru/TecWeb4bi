<?php include __DIR__ . '/../../includes/header.php' ?>
<main>
    <fieldset>
        <legend><?=(is_null($cliente)) ? ("Cadastro") : ("Edição")?> de Cliente</legend>

        <form class="row g-3" method="post" action="/cliente/form/create">
            <input type="hidden" name='id' value="<?=(is_null($cliente)) ? ("") : ($cliente->id)?>">

            <div class="col-12">
                <label for="">Nome:</label> <br>
                <input type="text" name="nome" value="<?=(is_null($cliente)) ? ("") : ($cliente->nome)?>"> <br><br>
            </div>

            <div class="col-12>
                <label for="">Endereço:</label> <br>
                <input type="text" name="endereco" value="<?=(is_null($cliente)) ? ("") : ($cliente->endereco)?>"> <br><br>
            </div>

            <div class="col-12">
                <label for="">Telefone:</label> <br>
                <input type="text" name="telefone" value="<?=(is_null($cliente)) ? ("") : ($cliente->telefone)?>"> <br><br>
            </div>

            <button class="btn btn-primary" type="submit" name="<?=(is_null($cliente)) ? ("cadastrar") : ("editar") ?>">
                <?=(is_null($cliente)) ? ("Cadastrar") : ("Editar") ?>
            </button>
        </form>
    </fieldset>
</main>
<?php include __DIR__ . '/../../includes/footer.php' ?>
