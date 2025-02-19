<?php include __DIR__ . '/../../includes/header.php' ?>
<main>
    <fieldset>
        <legend><?=(is_null($estilo)) ? ("Cadastro") : ("Edição")?> de Estilo</legend>

        <form class="row g-3" method="post" action="/estilo/form/create">
            <input type="hidden" name='id' value="<?=(is_null($estilo)) ? ("") : ($estilo->id)?>">

            <div class="col-12">
                <label for="">Nome:</label> <br>
                <input type="text" name="nome" value="<?=(is_null($estilo)) ? ("") : ($estilo->nome)?>"> <br><br>
            </div>

            <button class="btn btn-primary" type="submit" name="<?=(is_null($estilo)) ? ("cadastrar") : ("editar") ?>">
                <?=(is_null($estilo)) ? ("Cadastrar") : ("Editar") ?>
            </button>
        </form>
    </fieldset>
</main>
<?php include __DIR__ . '/../../includes/footer.php' ?>
