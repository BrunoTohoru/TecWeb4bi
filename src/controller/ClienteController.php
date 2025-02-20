<?php

namespace Controller;

use app\model\dao\ClienteDAO;
use app\model\entity\Cliente;

/**
 * Responsável por processar a requisição do usuário
 */
class ClienteController extends Controller {

    /**
     * Devolve a view de listagem de clientes
     */
    public static function listar() {
        parent::isProtected();
        $dao = new ClienteDAO();
        $clientes = $dao->read_all();
        include '../app/view/modules/cliente/ClienteListar.php';
    }

    public static function form() {
        parent::isProtected();
        $cliente = null;

        if (isset($_GET['edit'])) {
            $dao = new ClienteDAO();
            $cliente = $dao->read((int) $_GET['edit']);
        }

        include '../app/view/modules/cliente/ClienteForm.php';
    }

    public static function create() {
        parent::isProtected();
        $dao = new ClienteDAO();
        
        if (isset($_POST['cadastrar'])) {
            $cliente = new Cliente();
            $cliente->nome = $_POST['nome'];
            $cliente->endereco = $_POST['endereco'];
            $cliente->telefone = $_POST['telefone'];
        
            if ($dao->create($cliente)){
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

            if ($dao->update($cliente)){
                header("Location: /cliente");
            } else {
                echo '<script type="text/javascript">alert("Erro em editar");</script>';
            }
        }
    }

    public static function delete() {
        parent::isProtected();
        $id = $_GET['id'];
        $dao = new ClienteDAO();

        if ($dao->delete($id)) {
            header("Location: /cliente");
        } else {
            echo '<script type="text/javascript">alert("Erro em excluir");</script>';
        }
    }
}

?>