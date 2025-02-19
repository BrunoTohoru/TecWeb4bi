<?php include __DIR__ . '/../../includes/header.php' ?>
<main>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ano</th>
                <th>Duração</th>
                <th>Estilo</th>
                <th>Foto</th>
                <th>Sinopse</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filmes as $filme): ?>
            <tr>
                <td><?=$filme->nome ?></td>
                <td><?=$filme->ano ?></td>
                <td><?=$filme->duracao ?> min</td>
                <td><?=$filme->estilo ?></td>
                <td><?=$filme->foto ?></td>
                <td><?=$filme->sinopse ?></td>
                <td>
                    <a href="/filme/form?edit=<?=$filme->id?>">
                        <button>Editar</button>
                    </a>
                    <a href="/filme/delete?id=<?=$filme->id?>">
                        <button>Excluir</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include __DIR__ . '/../../includes/footer.php' ?>

