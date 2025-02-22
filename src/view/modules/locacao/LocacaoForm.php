<?php include __DIR__ . '/../../includes/header.php' ?>
<main>
    <fieldset>
        <legend><?=(is_null($locacao)) ? ("Cadastro") : ("Edição")?> de Locação</legend>

        <form class="row g-3" method="post" action="/locacao/form/create">
            <input type="hidden" name='id' value="<?=(is_null($locacao)) ? ("") : ($locacao->id)?>">

            <div class="col-md-6">
                <label for="">Filme:</label> <br>
                <select name="filme_id">
                    <?php foreach ($filmes as $filme): ?>
                        <option value="<?=$filme->id?>" <?=(is_null($locacao)) ? "" : "selected"?>><?=$filme->nome?></option>
                    <?php endforeach; ?>
                </select> <br><br>
            </div>

            <div class="col-md-6">
                <label for="">Cliente:</label> <br>
                <select name="cliente_id">
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?=$cliente->id?>" <?=(is_null($locacao)) ? "" : "selected"?>><?=$cliente->nome?></option>
                    <?php endforeach; ?>
                </select> <br><br>
            </div>

            <div class="col-md-6">
                <label for="">Data de Emissão:</label> <br>
                <input type="date" name="emissao" value="<?=(is_null($locacao)) ? ("") : ($locacao->emissao->format('d/m/Y'))?>"> <br><br>
            </div>

            <div class="col-md-6">
                <label for="">Data de Devolução:</label> <br>
                <input type="date" name="devolucao" value="<?=(is_null($locacao)) ? ("") : ($locacao->devolucao->format('d/m/Y'))?>"> <br><br>
            </div>

            <div class="col-md-6">
                <label for="">Valor:</label> <br>
                <input type="number" step="0.01" name="valor" min="1" value="<?=(is_null($locacao)) ? ("") : ($locacao->valor)?>"> <br><br>
            </div>

            <button class="btn btn-primary" type="submit" name="<?=(is_null($locacao)) ? ("cadastrar") : ("editar") ?>">
                <?=(is_null($locacao)) ? ("Cadastrar") : ("Editar") ?>
            </button>
        </form>
    </fieldset>
</main>
<?php include __DIR__ . '/../../includes/footer.php' ?>
