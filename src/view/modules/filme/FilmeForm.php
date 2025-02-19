<?php include __DIR__ . '/../../includes/header.php' ?>
<main>
    <fieldset>
        <legend><?=(is_null($filme)) ? ("Cadastro") : ("Edição")?> de Filme</legend>

        <form class="row g-3" method="post" action="/filme/form/create">
            <input type="hidden" name='id' value="<?=(is_null($filme)) ? ("") : ($filme->id)?>">

            <div class="col-12">
                <label class="form-label" for="">Nome:</label> <br>
                <input class="form-control" type="text" name="nome" value="<?=(is_null($filme)) ? ("") : ($filme->nome)?>"> <br><br>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="">Ano:</label> <br>
                <input class="form-control" type="number" name="ano" value="<?=(is_null($filme)) ? ("") : ($filme->ano)?>"> <br><br>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="">Duração (minutos):</label> <br>
                <input class="form-control" type="number" name="duracao" value="<?=(is_null($filme)) ? ("") : ($filme->duracao)?>"> <br><br>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="">Foto:</label> <br>
                <input class="form-control" type="file" name="foto" value="<?=(is_null($filme)) ? ("") : ($filme->foto)?>"> <br><br>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="">Estilo:</label> <br>
                <select name="estilo_id">
                    <?php foreach ($estilos as $estilo): ?>
                        <option value="<?=$estilo->id?>" <?=(is_null($filme) || $filme->estilo_id != $estilo->id) ? "" : "selected"?>><?=$estilo->nome?></option>
                    <?php endforeach; ?>
                </select> <br><br>
            </div>

            <div class="col-12">
                <label class="form-label" for="">Sinopse:</label> <br>
                <textarea class="form-control" name="sinopse"><?=(is_null($filme)) ? ("") : ($filme->sinopse)?></textarea> <br><br>
            </div>

            <button class="btn btn-primary" type="submit" name="<?=(is_null($filme)) ? ("cadastrar") : ("editar") ?>">
                <?=(is_null($filme)) ? ("Cadastrar") : ("Editar") ?>
            </button>
        </form>
    </fieldset>
</main>
<?php include __DIR__ . '/../../includes/footer.php' ?>
