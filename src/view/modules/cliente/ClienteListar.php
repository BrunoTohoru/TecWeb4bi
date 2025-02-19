<?php include __DIR__ . '/../../includes/header.php' ?>
<main>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?=$cliente->nome ?></td>
                <td><?=$cliente->endereco ?></td>
                <td><?=$cliente->telefone ?></td>
                <td>
                    <a href="/cliente/form?edit=<?=$cliente->id?>">
                        <button>Editar</button>
                    </a>
                    <a href="/cliente/delete?id=<?=$cliente->id?>">
                        <button>Excluir</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include __DIR__ . '/../../includes/footer.php' ?>
