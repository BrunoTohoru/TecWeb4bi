<?php 
namespace Dao\dao;
require __DIR__ . '/../../cli-config.php';

use app\model\entity\Cliente;
use \PDOException; // Importa PDO da raiz
use \PDO;

class ClienteDAO extends DAO {

    public function __construct() {
        // Chama o construtor do pai
        parent::__construct();
    }

    /**
    * Método Create (recebe um objeto de cliente)
    */
    public function create($cliente) {
        try {
            $entityManager->persist($cliente);
            return $entityManager->flush();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function read_all() {
        try {
            $query = $entityManager->createQuery("SELECT c FROM Entity\Cliente c");
            $clientes = $query->getResult();
            return $clientes;            
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function read($id) {
        try {
            $query = $entityManager->createQuery("SELECT c FROM Entity\Cliente c WHERE c.id = :clienteId")->setParameter('clienteId', $id);
            $cliente = $query->getResult();

            return $cliente;
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function update($cliente) {
        try {
            $clienteUpdate = $entityManager->find('Entity\Cliente', $cliente->getId());
            $clienteUpdate->setCliente($cliente);
            return $entityManager->flush();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function delete($id) {
        try {
            $query = $entityManager->createQuery("DELETE FROM Entity\Cliente c WHERE c.id = :id")->setParameter('id', $id);
            return $query->execute();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
}

?>
