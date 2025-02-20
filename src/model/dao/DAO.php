<?php 

namespace Dao;

use Doctrine\ORM\EntityManager;

//require_once('Conexao.class.php');

abstract class DAO {

    abstract public function create(EntityManager $entityManager, $object);
    abstract public function read(EntityManager $entityManager, $id);
    abstract public function read_all(EntityManager $entityManager);
    abstract public function update(EntityManager $entityManager, $object);
    abstract public function delete(EntityManager $entityManager, $id);

}

?>