<?php

namespace Controller;

use Dao\FilmeDAO;
use Dao\EstiloDAO;
use Entity\Filme;

/**
 * Responsável por processar a requisição do usuário
 */
class FilmeController extends Controller {

    /**
     * Devolve a view de listagem de filmes
     */
    public static function listar($entityManager) {
        parent::isProtected();
        $dao = new FilmeDAO();
        $filmes = $dao->read_all($entityManager);
        
        include '../src/view/modules/filme/FilmeListar.php';
    }

    public static function form($entityManager) {
        parent::isProtected();
        $filme = null;
        $daoEstilo = new EstiloDAO();
        $estilos = $daoEstilo->read_all($entityManager);
        if (isset($_GET['edit'])) {
            $dao = new FilmeDAO();
            $filme = $dao->read($entityManager, (int) $_GET['edit']);
        }

        include '../src/view/modules/filme/FilmeForm.php';
    }

    public static function create($entityManager) {
        parent::isProtected();
        $dao = new FilmeDAO();
        $daoEstilo = new EstiloDAO();
        if (isset($_POST['cadastrar'])) {
            $filme = new Filme();
            $filme->nome = $_POST['nome'];
            $filme->ano = $_POST['ano'];
            $filme->duracao = $_POST['duracao'];
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                // Lê o conteúdo do arquivo
                $fotoConteudo = file_get_contents($_FILES['foto']['tmp_name']);
                $filme->foto = $fotoConteudo; // Atribui o conteúdo binário ao campo $foto
            } else {
                echo '<script type="text/javascript">alert("Erro no upload da foto");</script>';
                return;
            }
            $filme->sinopse = $_POST['sinopse'];
            $filme->estilo = $daoEstilo->read($entityManager,(int) $_POST['estilo_id']);
        
            if ($dao->create($entityManager, $filme)){
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
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                // Lê o conteúdo do arquivo
                $fotoConteudo = file_get_contents($_FILES['foto']['tmp_name']);
                $filme->foto = $fotoConteudo; // Atribui o conteúdo binário ao campo $foto
            } else {
                echo '<script type="text/javascript">alert("Erro no upload da foto");</script>';
                return;
            }
            $filme->sinopse = $_POST['sinopse'];
            $filme->estilo = $daoEstilo->read($entityManager,(int) $_POST['estilo_id']);

            if ($dao->update($entityManager, $filme)){
                header("Location: /filme");
            } else {
                echo '<script type="text/javascript">alert("Erro em editar");</script>';
            }
        }
    }

    public static function delete($entityManager) {
        parent::isProtected();
        $id = $_GET['id'];
        $dao = new FilmeDAO();

        if ($dao->delete($entityManager, $id)) {
            header("Location: /filme");
        } else {
            echo '<script type="text/javascript">alert("Erro em excluir");</script>';
        }
    }
}

?>
