<?php 

namespace app\model\dao;

use app\model\entity\Filme;
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
    public function create($filme) {
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

    public function read_all() {
        try {
            $pdo = $this->conexao->get_pdo();

            $pdo_sql = $pdo->prepare("SELECT f.id, f.nome, f.ano, f.duracao, f.foto, f.sinopse, e.nome as estilo FROM filme f INNER JOIN estilo e ON f.estilo_id = e.id;");
            $pdo_sql->execute();
            $array_retorno = $pdo_sql->fetchAll();

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

    public function read($id) {
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

    public function update($filme) {
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

    public function delete($id) {
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
