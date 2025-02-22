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
                <td><?=$locacao->filme->nome ?></td>
                <td><?=$locacao->cliente->nome ?></td>
                <td><?=$locacao->emissao->format('d/m/Y') ?></td>
                <td><?=$locacao->devolucao->format('d/m/Y') ?></td>
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
