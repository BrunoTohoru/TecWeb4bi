<?php

namespace Controller;

use Dao\ClienteDAO;
use Entity\Cliente;

/**
 * Responsável por processar a requisição do usuário
 */
class ClienteController extends Controller {

    /**
     * Devolve a view de listagem de clientes
     */
    public static function listar($entityManager) {
        parent::isProtected();
        $dao = new ClienteDAO();
        $clientes = $dao->read_all($entityManager);
        include '../src/view/modules/cliente/ClienteListar.php';
    }

    public static function form($entityManager) {
        parent::isProtected();
        $cliente = null;

        if (isset($_GET['edit'])) {
            $dao = new ClienteDAO();
            $cliente = $dao->read($entityManager, (int) $_GET['edit']);
        }

        include '../src/view/modules/cliente/ClienteForm.php';
    }

    public static function create($entityManager) {
        parent::isProtected();
        $dao = new ClienteDAO($entityManager);

        if (isset($_POST['cadastrar'])) {
            $cliente = new Cliente();
            $cliente->nome = $_POST['nome'];
            $cliente->endereco = $_POST['endereco'];
            $cliente->telefone = $_POST['telefone'];

            if ($dao->create($entityManager, $cliente)){
                header("Location: /cliente");
            } else {
                echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
            }
        } elseif (isset($_POST['editar'])) {
            $cliente = new Cliente();
            $cliente->id = $_POST['id'];
            $cliente->nome = $_POST['nome'];
            $cliente->endereco = $_POST['endereco'];
            $cliente->telefone = $_POST['telefone'];

            if ($dao->update($entityManager, $cliente)){
                header("Location: /cliente");
            } else {
                echo '<script type="text/javascript">alert("Erro em editar");</script>';
            }
        }
    }

    public static function delete($entityManager) {
        parent::isProtected();
        $id = $_GET['id'];
        $dao = new ClienteDAO();

        if ($dao->delete($entityManager, $id)) {
            header("Location: /cliente");
        } else {
            echo '<script type="text/javascript">alert("Erro em excluir");</script>';
        }
    }
}

?>