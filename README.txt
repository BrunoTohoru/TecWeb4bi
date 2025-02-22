Problema ao executar o comando:

php vendor/bin/doctrine orm:schema-tool:create

Para resolver vá ao arquivo composer.json e remova os requires:

"doctrine/orm": "^3.3",
"symfony/cache": "^6.0"

Então use o comando:

composer update

Ele removerá essas dependências, em seguida adicione novamente os mesmo requires e use novamente o comando anterior.

Execute novamente o comando que cria o banco pelo mapeamento, e o banco estará criado.