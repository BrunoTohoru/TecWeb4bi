<?php 

namespace app\model\dao;

use app\model\entity\Estilo;
use \PDOException; // Importa PDO da raiz
use \PDO;

class EstiloDAO extends DAO {

    public function __construct() {
        // Chama o construtor do pai
        parent::__construct();
    }

    /**
    * Método Create (recebe um objeto de estilo)
    */
    public function create($estilo) {
        try {
            $entityManager->persist($estilo);
            return $entityManager->flush();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function read_all() {
        try {
            $query = $entityManager->createQuery("SELECT e FROM Entity\Estilo e");
            $estilos = $query->getResult();
            return $estilos;             
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function read($id) {
        try {
            $query = $entityManager->createQuery("SELECT e FROM Entity\Estilo e WHERE e.id = :estiloId")->setParameter('estiloId', $id);
            $estilo = $query->getResult();

            return $estilo;
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function update($estilo) {
        try {
            $estiloUpdate = $entityManager->find('Entity\Estilo', $estilo->getId());
            $estiloUpdate->setEstilo($estilo);
            return $entityManager->flush();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function delete($id) {
        try {
            $query = $entityManager->createQuery("DELETE FROM Entity\Estilo e WHERE e.id = :id")->setParameter('id', $id);
            return $query->execute();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
}

?>
