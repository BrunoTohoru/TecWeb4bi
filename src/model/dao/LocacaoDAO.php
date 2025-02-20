<?php

namespace Dao;

use Entity\Locacao;
use Doctrine\ORM\EntityManager;

class LocacaoDAO extends DAO {

    public function create(EntityManager $entityManager, $locacao) {
        $entityManager->persist($locacao);
        $entityManager->flush();
        return true;
    }

    public function read(EntityManager $entityManager, $id) {
        return $entityManager->find('Entity\Locacao', $id);
    }

    public function read_all(EntityManager $entityManager) {
        return $entityManager->getRepository('Entity\Locacao')->findAll();
    }

    public function update(EntityManager $entityManager, $locacao) {
        $locacaoExistente = $entityManager->find('Entity\Locacao', $locacao->id);
        if ($locacaoExistente) {
            $locacaoExistente->filme_id = $locacao->filme_id;
            $locacaoExistente->cliente_id = $locacao->cliente_id;
            $locacaoExistente->emissao = $locacao->emissao;
            $locacaoExistente->devolucao = $locacao->devolucao;
            $locacaoExistente->valor = $locacao->valor;
            $entityManager->flush();
            return true;
        }
        return false;
    }

    public function delete(EntityManager $entityManager, $id) {
        $locacao = $entityManager->find('Entity\Locacao', $id);
        if ($locacao) {
            $entityManager->remove($locacao);
            $entityManager->flush();
            return true;
        }
        return false;
    }
}
?>