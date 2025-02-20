<?php

namespace app\controller;

use app\model\dao\EstiloDAO;
use app\model\entity\Estilo;

/**
 * Responsável por processar a requisição do usuário
 */
class EstiloController extends Controller {

    /**
     * Devolve a view de listagem de estilos
     */
    public static function listar() {
        parent::isProtected();
        $dao = new EstiloDAO();
        $estilos = $dao->read_all();
        include '../app/view/modules/estilo/EstiloListar.php';
    }

    public static function form() {
        parent::isProtected();
        $estilo = null;

        if (isset($_GET['edit'])) {
            $dao = new EstiloDAO();
            $estilo = $dao->read((int) $_GET['edit']);
        }

        include '../app/view/modules/estilo/EstiloForm.php';
    }

    public static function create() {
        parent::isProtected();
        $dao = new EstiloDAO();
        
        if (isset($_POST['cadastrar'])) {
            $estilo = new Estilo();
            $estilo->nome = $_POST['nome'];
        
            if ($dao->create($estilo)){
                header("Location: /estilo");
            } else {
                echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
            }
        } elseif (isset($_POST['editar'])) {
            $estilo = new Estilo();
            $estilo->id = $_POST['id'];
            $estilo->nome = $_POST['nome'];

            if ($dao->update($estilo)){
                header("Location: /estilo");
            } else {
                echo '<script type="text/javascript">alert("Erro em editar");</script>';
            }
        }
    }

    public static function delete() {
        parent::isProtected();
        $id = $_GET['id'];
        $dao = new EstiloDAO();

        if ($dao->delete($id)) {
            header("Location: /estilo");
        } else {
            echo '<script type="text/javascript">alert("Erro em excluir");</script>';
        }
    }
}

?>
