<?php include __DIR__ . '/../../includes/header.php' ?>
<main>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Filme</th>
                <th>Cliente</th>
                <th>Data de Emissão</th>
                <th>Data de Devolução</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locacoes as $locacao): ?>
            <tr>
                <td><?=$locacao->filme ?></td>
                <td><?=$locacao->cliente ?></td>
                <td><?=$locacao->emissao ?></td>
                <td><?=$locacao->devolucao ?></td>
                <td>R$ <?=number_format($locacao->valor, 2, ',', '.')?></td>
                <td>
                    <a href="/locacao/form?edit=<?=$locacao->id?>">
                        <button>Editar</button>
                    </a>
                    <a href="/locacao/delete?id=<?=$locacao->id?>">
                        <button>Excluir</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include __DIR__ . '/../../includes/footer.php' ?>
