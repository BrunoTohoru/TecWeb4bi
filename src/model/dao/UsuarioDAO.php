<?php 

namespace Dao;

use Entity\Usuario;
use Doctrine\ORM\EntityManager;
use \PDOException; // Importa PDO da raiz
use \PDO;

//require_once('DAO.class.php');
//require_once('model/Funcionario.class.php');

class UsuarioDAO extends DAO {

    public function create($entityManager, $usuario) {

    }
    public function read($entityManager, $id) {

    }
    public function read_all($entityManager) {

    }
    public function update($entityManager, $usuario) {

    }
    public function delete($entityManager, $id) {

    }


    public function readUserByUserAndPass(EntityManager $entityManager, $usuario, $senha) {
        
        try {
            $query = $entityManager->createQuery("SELECT u FROM Entity\Usuario u WHERE u.id = :usuarioId AND u.senha = :senha")->setParameter('usuarioId', $usuario->id)->setParameter('senha', $senha);
            
            $array_usuario = $query->getResult();

            if ($array_usuario) {
                // Tranformar array de retorno em objeto funcionario
                $usuario = new Usuario();
                $usuario->id = $array_usuario['id'];
                $usuario->nome = $array_usuario['nome'];
                $usuario->usuario = $array_usuario['usuario'];
                $usuario->senha = $array_usuario['senha'];

                return $usuario;
            } else {
                return null;
            }
           
        } catch (PDOException $ex) {
            return 'error '. $ex->getMessage();
        }
    }

}

?>