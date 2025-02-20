<?php

namespace Dao;

use Entity\Filme;
use \PDOException; // Importa PDO da raiz
use \PDO;

class FilmeDAO extends DAO {

    public function __construct() {
        // Chama o construtor do pai
        parent::__construct();
    }

    /**
    * Método Create (recebe um objeto de filme)
    */
    public function create($entityManager, $filme) {
        try {
            $pdo = $this->conexao->get_pdo();

            $pdo_sql = $pdo->prepare("INSERT INTO filme (nome, ano, duracao, foto, sinopse, estilo_id) VALUES (:nome, :ano, :duracao, :foto, :sinopse, :estilo_id);");
            $pdo_sql->bindParam(":nome", $filme->nome, PDO::PARAM_STR);
            $pdo_sql->bindParam(":ano", $filme->ano, PDO::PARAM_INT);
            $pdo_sql->bindParam(":duracao", $filme->duracao, PDO::PARAM_INT);
            $pdo_sql->bindParam(":foto", $filme->foto, PDO::PARAM_STR);
            $pdo_sql->bindParam(":sinopse", $filme->sinopse, PDO::PARAM_STR);
            $pdo_sql->bindParam(":estilo_id", $filme->estilo_id, PDO::PARAM_INT);

            return $pdo_sql->execute();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function read_all($entityManager) {
        try {
            $query = $entityManager->createQuery("SELECT f, e.nome AS estilo FROM Entity\Filme f INNER JOIN Entity\Estilo e ON f.estilo_id = e.id");
            $array_retorno = $query->getResult();

            $filmes = array();
            foreach ($array_retorno as $array_filme) {
                $filme = new Filme();
                $filme->id = $array_filme['id'];
                $filme->nome = $array_filme['nome'];
                $filme->ano = $array_filme['ano'];
                $filme->duracao = $array_filme['duracao'];
                $filme->foto = $array_filme['foto'];
                $filme->sinopse = $array_filme['sinopse'];
                $filme->estilo = $array_filme['estilo'];

                $filmes[] = $filme;
            }
            return $filmes;
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function read($entityManager, $id) {
        try {
            $pdo = $this->conexao->get_pdo();

            $pdo_sql = $pdo->prepare("SELECT id, nome, ano, duracao, foto, sinopse, estilo_id FROM filme WHERE id=:id;");
            $pdo_sql->bindParam(":id", $id, PDO::PARAM_INT);
            $pdo_sql->execute();
            $array_filme = $pdo_sql->fetch();

            $filme = new Filme();
            $filme->id = $array_filme['id'];
            $filme->nome = $array_filme['nome'];
            $filme->ano = $array_filme['ano'];
            $filme->duracao = $array_filme['duracao'];
            $filme->foto = $array_filme['foto'];
            $filme->sinopse = $array_filme['sinopse'];
            $filme->estilo_id = $array_filme['estilo_id'];

            return $filme;
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function update($entityManager, $filme) {
        try {
            $pdo = $this->conexao->get_pdo();

            $pdo_sql = $pdo->prepare("UPDATE filme SET nome=:nome, ano=:ano, duracao=:duracao, foto=:foto, sinopse=:sinopse, estilo_id=:estilo_id WHERE id=:id;");
            $pdo_sql->bindValue(":id", $filme->id);
            $pdo_sql->bindParam(":nome", $filme->nome, PDO::PARAM_STR);
            $pdo_sql->bindParam(":ano", $filme->ano, PDO::PARAM_INT);
            $pdo_sql->bindParam(":duracao", $filme->duracao, PDO::PARAM_INT);
            $pdo_sql->bindParam(":foto", $filme->foto, PDO::PARAM_STR);
            $pdo_sql->bindParam(":sinopse", $filme->sinopse, PDO::PARAM_STR);
            $pdo_sql->bindParam(":estilo_id", $filme->estilo_id, PDO::PARAM_INT);

            return $pdo_sql->execute();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function delete($entityManager, $id) {
        try {
            $pdo = $this->conexao->get_pdo();

            $pdo_sql = $pdo->prepare("DELETE FROM filme WHERE id=:id;");
            $pdo_sql->bindParam(":id", $id, PDO::PARAM_INT);
            return $pdo_sql->execute();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
}

?>
