<?php

namespace Dao;

use Entity\Usuario;
use Doctrine\ORM\EntityManager;

class UsuarioDAO extends DAO {

    public function create(EntityManager $entityManager, $usuario) {
        $entityManager->persist($usuario);
        $entityManager->flush();
        return true;
    }

    public function read(EntityManager $entityManager, $id) {
        return $entityManager->find('Entity\Usuario', $id);
    }

    public function read_all(EntityManager $entityManager) {
        return $entityManager->getRepository('Entity\Usuario')->findAll();
    }

    public function update(EntityManager $entityManager, $usuario) {
        $usuarioExistente = $entityManager->find('Entity\Usuario', $usuario->id);
        if ($usuarioExistente) {
            $usuarioExistente->nome = $usuario->nome;
            $usuarioExistente->usuario = $usuario->usuario;
            $usuarioExistente->senha = $usuario->senha;
            $entityManager->flush();
            return true;
        }
        return false;
    }

    public function delete(EntityManager $entityManager, $id) {
        $usuario = $entityManager->find('Entity\Usuario', $id);
        if ($usuario) {
            $entityManager->remove($usuario);
            $entityManager->flush();
            return true;
        }
        return false;
    }

    public function readUserByUserAndPass(EntityManager $entityManager, $usuario, $senha) {
        return $entityManager->getRepository('Entity\Usuario')->findOneBy([
            'usuario' => $usuario,
            'senha' => $senha
        ]);
    }
}
?>