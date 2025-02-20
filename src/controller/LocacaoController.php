<?php

namespace Controller;

use Dao\LocacaoDAO;
use Dao\FilmeDAO;
use Dao\ClienteDAO;
use Entity\Locacao;
use Controller\Controller;

/**
 * Responsável por processar a requisição do usuário
 */
class LocacaoController extends Controller {

    /**
     * Devolve a view de listagem de locações
     */
    public static function listar($entityManager) {
        parent::isProtected();
        $dao = new LocacaoDAO();
        $locacoes = $dao->read_all($entityManager);
        include '../src/view/modules/locacao/LocacaoListar.php';
    }

    public static function form($entityManager) {
        parent::isProtected();
        $locacao = null;
        $daoFilme = new FilmeDAO();
        $daoCliente = new ClienteDAO();
        $filmes = $daoFilme->read_all($entityManager);
        $clientes = $daoCliente->read_all($entityManager);
        if (isset($_GET['edit'])) {
            $dao = new LocacaoDAO();
            $locacao = $dao->read($entityManager, (int) $_GET['edit']);
        }

        include '../src/view/modules/locacao/LocacaoForm.php';
    }

    public static function create($entityManager) {
        parent::isProtected();
        $dao = new LocacaoDAO();

        if (isset($_POST['cadastrar'])) {
            $locacao = new Locacao();
            $locacao->filme = $_POST['filme_id'];
            $locacao->cliente = $_POST['cliente_id'];
            $locacao->emissao = new \DateTime($_POST['emissao']);
            $locacao->devolucao = new \DateTime($_POST['devolucao']);
            $locacao->valor = $_POST['valor'];

            if ($dao->create($entityManager, $locacao)){
                header("Location: /locacao");
            } else {
                echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
            }
        } elseif (isset($_POST['editar'])) {
            $locacao = new Locacao();
            $locacao->id = $_POST['id'];
            $locacao->filme = $_POST['filme_id'];
            $locacao->cliente = $_POST['cliente_id'];
            $locacao->emissao = $_POST['emissao'];
            $locacao->devolucao = $_POST['devolucao'];
            $locacao->valor = $_POST['valor'];

            if ($dao->update($entityManager, $locacao)){
                header("Location: /locacao");
            } else {
                echo '<script type="text/javascript">alert("Erro em editar");</script>';
            }
        }
    }

    public static function delete($entityManager) {
        parent::isProtected();
        $id = $_GET['id'];
        $dao = new LocacaoDAO();

        if ($dao->delete($entityManager, $id)) {
            header("Location: /locacao");
        } else {
            echo '<script type="text/javascript">alert("Erro em excluir");</script>';
        }
    }
}

?>
