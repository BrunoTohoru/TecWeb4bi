<?php

namespace Dao;

use Entity\Estilo;
use Doctrine\ORM\EntityManager;

class EstiloDAO extends DAO {

    public function create(EntityManager $entityManager, $estilo) {
        $entityManager->persist($estilo);
        $entityManager->flush();
        return true;
    }

    public function read(EntityManager $entityManager, $id) {
        return $entityManager->find('Entity\Estilo', $id);
    }

    public function read_all(EntityManager $entityManager) {
        return $entityManager->getRepository('Entity\Estilo')->findAll();
    }

    public function update(EntityManager $entityManager, $estilo) {
        $estiloExistente = $entityManager->find('Entity\Estilo', $estilo->id);
        if ($estiloExistente) {
            $estiloExistente->nome = $estilo->nome;
            $entityManager->flush();
            return true;
        }
        return false;
    }

    public function delete(EntityManager $entityManager, $id) {
        $estilo = $entityManager->find('Entity\Estilo', $id);
        if ($estilo) {
            $entityManager->remove($estilo);
            $entityManager->flush();
            return true;
        }
        return false;
    }
}
?>