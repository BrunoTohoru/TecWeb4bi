<?php

namespace Entity;

use Doctrine\ORM\Mapping\Column; 
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;

#[Entity()]
#[Table(name: 'estilo')]
class Estilo {

    #[Id]
    #[Column(type: "integer"), GeneratedValue]
    private $id;

    #[Column(type: "string")]
    private $nome;

    #[ORM\OneToMany(targetEntity: Filme::class, mappedBy: 'estilo')]
    private $filmes;
    /**
     * Método mágico
     */
    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    /**
     * Método mágico
     */
    public function __get($atributo) {
        return $this->$atributo;
    }
}

?>