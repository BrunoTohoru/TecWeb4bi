<?php

namespace Controller;

use Dao\EstiloDAO;
use Entity\Estilo;

/**
 * Responsável por processar a requisição do usuário
 */
class EstiloController extends Controller {

    /**
     * Devolve a view de listagem de estilos
     */
    public static function listar($entityManager) {
        parent::isProtected();
        $dao = new EstiloDAO();
        $estilos = $dao->read_all($entityManager);
        include '../src/view/modules/estilo/EstiloListar.php';
    }

    public static function form($entityManager) {
        parent::isProtected();
        $estilo = null;

        if (isset($_GET['edit'])) {
            $dao = new EstiloDAO();
            $estilo = $dao->read($entityManager, (int) $_GET['edit']);
        }

        include '../src/view/modules/estilo/EstiloForm.php';
    }

    public static function create($entityManager) {
        parent::isProtected();
        $dao = new EstiloDAO();

        if (isset($_POST['cadastrar'])) {
            $estilo = new Estilo();
            $estilo->nome = $_POST['nome'];

            if ($dao->create($entityManager, $estilo)){
                header("Location: /estilo");
            } else {
                echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
            }
        } elseif (isset($_POST['editar'])) {
            $estilo = new Estilo();
            $estilo->id = $_POST['id'];
            $estilo->nome = $_POST['nome'];

            if ($dao->update($entityManager, $estilo)){
                header("Location: /estilo");
            } else {
                echo '<script type="text/javascript">alert("Erro em editar");</script>';
            }
        }
    }

    public static function delete($entityManager) {
        parent::isProtected();
        $id = $_GET['id'];
        $dao = new EstiloDAO();

        if ($dao->delete($entityManager, $id)) {
            header("Location: /estilo");
        } else {
            echo '<script type="text/javascript">alert("Erro em excluir");</script>';
        }
    }
}

?>
