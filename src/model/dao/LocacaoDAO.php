<?php

namespace Dao;

use Entity\Locacao;
use \PDOException; // Importa PDO da raiz
use \PDO;

class LocacaoDAO extends DAO {

    public function __construct() {
        // Chama o construtor do pai
        parent::__construct();
    }

    /**
    * Método Create (recebe um objeto de locacao)
    */
    public function create($entityManager, $locacao) {
        try {
            $pdo = $this->conexao->get_pdo();

            $pdo_sql = $pdo->prepare("INSERT INTO locacao (emissao, devolucao, valor, filme_id, cliente_id) VALUES (:emissao, :devolucao, :valor, :filme_id, :cliente_id);");
            $pdo_sql->bindParam(":emissao", $locacao->emissao, PDO::PARAM_STR);
            $pdo_sql->bindParam(":devolucao", $locacao->devolucao, PDO::PARAM_STR);
            $pdo_sql->bindParam(":valor", $locacao->valor, PDO::PARAM_STR);
            $pdo_sql->bindParam(":filme_id", $locacao->filme_id, PDO::PARAM_INT);
            $pdo_sql->bindParam(":cliente_id", $locacao->cliente_id, PDO::PARAM_INT);

            return $pdo_sql->execute();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function read_all($entityManager) {
        try {
            $pdo = $this->conexao->get_pdo();

            $pdo_sql = $pdo->prepare("SELECT l.id, l.emissao, l.devolucao, l.valor, f.nome AS filme, c.nome AS cliente FROM locacao l INNER JOIN filme f ON l.filme_id = f.id INNER JOIN cliente c ON l.cliente_id = c.id;");
            $pdo_sql->execute();
            $array_retorno = $pdo_sql->fetchAll();

            $locacoes = array();
            foreach ($array_retorno as $array_locacao) {
                $locacao = new Locacao();
                $locacao->id = $array_locacao['id'];
                $locacao->emissao = $array_locacao['emissao'];
                $locacao->devolucao = $array_locacao['devolucao'];
                $locacao->valor = $array_locacao['valor'];
                $locacao->filme = $array_locacao['filme'];
                $locacao->cliente = $array_locacao['cliente'];

                $locacoes[] = $locacao;
            }
            return $locacoes;            
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function read($entityManager, $id) {
        try {
            $pdo = $this->conexao->get_pdo();

            $pdo_sql = $pdo->prepare("SELECT id, emissao, devolucao, valor, filme_id, cliente_id FROM locacao WHERE id=:id;");
            $pdo_sql->bindParam(":id", $id, PDO::PARAM_INT);
            $pdo_sql->execute();
            $array_locacao = $pdo_sql->fetch();

            $locacao = new Locacao();
            $locacao->id = $array_locacao['id'];
            $locacao->emissao = $array_locacao['emissao'];
            $locacao->devolucao = $array_locacao['devolucao'];
            $locacao->valor = $array_locacao['valor'];
            $locacao->filme_id = $array_locacao['filme_id'];
            $locacao->cliente_id = $array_locacao['cliente_id'];

            return $locacao;
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function update($entityManager, $locacao) {
        try {
            $pdo = $this->conexao->get_pdo();

            $pdo_sql = $pdo->prepare("UPDATE locacao SET emissao=:emissao, devolucao=:devolucao, valor=:valor, filme_id=:filme_id, cliente_id=:cliente_id WHERE id=:id;");
            $pdo_sql->bindValue(":id", $locacao->id);
            $pdo_sql->bindParam(":emissao", $locacao->emissao, PDO::PARAM_STR);
            $pdo_sql->bindParam(":devolucao", $locacao->devolucao, PDO::PARAM_STR);
            $pdo_sql->bindParam(":valor", $locacao->valor, PDO::PARAM_STR);
            $pdo_sql->bindParam(":filme_id", $locacao->filme_id, PDO::PARAM_INT);
            $pdo_sql->bindParam(":cliente_id", $locacao->cliente_id, PDO::PARAM_INT);

            return $pdo_sql->execute();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function delete($entityManager, $id) {
        try {
            $pdo = $this->conexao->get_pdo();

            $pdo_sql = $pdo->prepare("DELETE FROM locacao WHERE id=:id;");
            $pdo_sql->bindParam(":id", $id, PDO::PARAM_INT);
            return $pdo_sql->execute();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
}

?>
