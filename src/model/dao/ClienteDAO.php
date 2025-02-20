<?php

namespace Dao;

use Entity\Cliente;
use Doctrine\ORM\EntityManager;

class ClienteDAO extends DAO {

    public function create(EntityManager $entityManager, $cliente) {
        $entityManager->persist($cliente);
        $entityManager->flush();
        return true;
    }

    public function read(EntityManager $entityManager, $id) {
        return $entityManager->find('Entity\Cliente', $id);
    }

    public function read_all(EntityManager $entityManager) {
        return $entityManager->getRepository('Entity\Cliente')->findAll();
    }

    public function update(EntityManager $entityManager, $cliente) {
        $clienteExistente = $entityManager->find('Entity\Cliente', $cliente->id);
        if ($clienteExistente) {
            $clienteExistente->nome = $cliente->nome;
            $clienteExistente->endereco = $cliente->endereco;
            $clienteExistente->telefone = $cliente->telefone;
            $entityManager->flush();
            return true;
        }
        return false;
    }

    public function delete(EntityManager $entityManager, $id) {
        $cliente = $entityManager->find('Entity\Cliente', $id);
        if ($cliente) {
            $entityManager->remove($cliente);
            $entityManager->flush();
            return true;
        }
        return false;
    }
}
?>