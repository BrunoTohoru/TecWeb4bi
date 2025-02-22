<?php

namespace Dao;

use Entity\Filme;
use Doctrine\ORM\EntityManager;

class FilmeDAO extends DAO {

    public function create(EntityManager $entityManager, $filme) {
        $entityManager->persist($filme);
        $entityManager->flush();
        return true;
    }

    public function read(EntityManager $entityManager, $id) {
        return $entityManager->find('Entity\Filme', $id);
    }

    public function read_all(EntityManager $entityManager) {
        return $entityManager->getRepository('Entity\Filme')->findAll();
    }

    public function update(EntityManager $entityManager, $filme) {
        $filmeExistente = $entityManager->find('Entity\Filme', $filme->id);
        if ($filmeExistente) {
            $filmeExistente->nome = $filme->nome;
            $filmeExistente->ano = $filme->ano;
            $filmeExistente->duracao = $filme->duracao;
            $filmeExistente->foto = $filme->foto;
            $filmeExistente->sinopse = $filme->sinopse;
            $filmeExistente->estilo = $filme->estilo;
            $entityManager->flush();
            return true;
        }
        return false;
    }

    public function delete(EntityManager $entityManager, $id) {
        $filme = $entityManager->find('Entity\Filme', $id);
        if ($filme) {
            $entityManager->remove($filme);
            $entityManager->flush();
            return true;
        }
        return false;
    }
}
?>