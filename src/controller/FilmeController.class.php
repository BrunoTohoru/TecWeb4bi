<?php

namespace app\controller;

use app\model\dao\FilmeDAO;
use app\model\dao\EstiloDAO;
use app\model\entity\Filme;

/**
 * Responsável por processar a requisição do usuário
 */
class FilmeController extends Controller {

    /**
     * Devolve a view de listagem de filmes
     */
    public static function listar() {
        parent::isProtected();
        $dao = new FilmeDAO();
        $filmes = $dao->read_all();
        
        include '../app/view/modules/filme/FilmeListar.php';
    }

    public static function form() {
        parent::isProtected();
        $filme = null;
        $daoEstilo = new EstiloDAO();
        $estilos = $daoEstilo->read_all();
        if (isset($_GET['edit'])) {
            $dao = new FilmeDAO();
            $filme = $dao->read((int) $_GET['edit']);
        }

        include '../app/view/modules/filme/FilmeForm.php';
    }

    public static function create() {
        parent::isProtected();
        $dao = new FilmeDAO();
        
        if (isset($_POST['cadastrar'])) {
            $filme = new Filme();
            $filme->nome = $_POST['nome'];
            $filme->ano = $_POST['ano'];
            $filme->duracao = $_POST['duracao'];
            $filme->foto = $_POST['foto'];
            $filme->sinopse = $_POST['sinopse'];
            $filme->estilo_id = $_POST['estilo_id'];
        
            if ($dao->create($filme)){
                header("Location: /filme");
            } else {
                echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
            }
        } elseif (isset($_POST['editar'])) {
            $filme = new Filme();
            $filme->id = $_POST['id'];
            $filme->nome = $_POST['nome'];
            $filme->ano = $_POST['ano'];
            $filme->duracao = $_POST['duracao'];
            $filme->foto = $_POST['foto'];
            $filme->sinopse = $_POST['sinopse'];
            $filme->estilo_id = $_POST['estilo_id'];

            if ($dao->update($filme)){
                header("Location: /filme");
            } else {
                echo '<script type="text/javascript">alert("Erro em editar");</script>';
            }
        }
    }

    public static function delete() {
        parent::isProtected();
        $id = $_GET['id'];
        $dao = new FilmeDAO();

        if ($dao->delete($id)) {
            header("Location: /filme");
        } else {
            echo '<script type="text/javascript">alert("Erro em excluir");</script>';
        }
    }
}

?>
