<?php

namespace app\controller;

use app\model\dao\LocacaoDAO;
use app\model\dao\FilmeDAO;
use app\model\dao\ClienteDAO;
use app\model\entity\Locacao;

/**
 * Responsável por processar a requisição do usuário
 */
class LocacaoController extends Controller {

    /**
     * Devolve a view de listagem de locações
     */
    public static function listar() {
        parent::isProtected();
        $dao = new LocacaoDAO();
        $locacoes = $dao->read_all();
        include '../app/view/modules/locacao/LocacaoListar.php';
    }

    public static function form() {
        parent::isProtected();
        $locacao = null;
        $daoFilme = new FilmeDAO();
        $daoCliente = new ClienteDAO();
        $filmes = $daoFilme->read_all();
        $clientes = $daoCliente->read_all();
        if (isset($_GET['edit'])) {
            $dao = new LocacaoDAO();
            $locacao = $dao->read((int) $_GET['edit']);
        }

        include '../app/view/modules/locacao/LocacaoForm.php';
    }

    public static function create() {
        parent::isProtected();
        $dao = new LocacaoDAO();
        
        if (isset($_POST['cadastrar'])) {
            $locacao = new Locacao();
            $locacao->filme_id = $_POST['filme_id'];
            $locacao->cliente_id = $_POST['cliente_id'];
            $locacao->emissao = $_POST['emissao'];
            $locacao->devolucao = $_POST['devolucao'];
            $locacao->valor = $_POST['valor'];
        
            if ($dao->create($locacao)){
                header("Location: /locacao");
            } else {
                echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
            }
        } elseif (isset($_POST['editar'])) {
            $locacao = new Locacao();
            $locacao->id = $_POST['id'];
            $locacao->filme_id = $_POST['filme_id'];
            $locacao->cliente_id = $_POST['cliente_id'];
            $locacao->emissao = $_POST['emissao'];
            $locacao->devolucao = $_POST['devolucao'];
            $locacao->valor = $_POST['valor'];

            if ($dao->update($locacao)){
                header("Location: /locacao");
            } else {
                echo '<script type="text/javascript">alert("Erro em editar");</script>';
            }
        }
    }

    public static function delete() {
        parent::isProtected();
        $id = $_GET['id'];
        $dao = new LocacaoDAO();

        if ($dao->delete($id)) {
            header("Location: /locacao");
        } else {
            echo '<script type="text/javascript">alert("Erro em excluir");</script>';
        }
    }
}

?>
