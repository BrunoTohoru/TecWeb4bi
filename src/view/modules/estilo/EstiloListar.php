<?php include __DIR__ . '/../../includes/header.php' ?>
<main>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estilos as $estilo): ?>
            <tr>
                <td><?=$estilo->nome ?></td>
                <td>
                    <a href="/estilo/form?edit=<?=$estilo->id?>">
                        <button>Editar</button>
                    </a>
                    <a href="/estilo/delete?id=<?=$estilo->id?>">
                        <button>Excluir</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include __DIR__ . '/../../includes/footer.php' ?>
