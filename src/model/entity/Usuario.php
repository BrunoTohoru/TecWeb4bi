<?php

namespace Entity;

use Doctrine\ORM\Mapping\Column; 
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;

#[Entity()]
#[Table(name: 'usuario')]
class Usuario {

    #[Id]
    #[Column(type: "integer"), GeneratedValue]
    private $id;

    #[Column(type: "string")]
    private $nome;

    #[Column(type: "string")]
    private $usuario;

    #[Column(type: "string")]
    private $senha;
    
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