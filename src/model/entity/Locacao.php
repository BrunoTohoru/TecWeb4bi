<?php

namespace Entities;

use Doctrine\ORM\Mapping\Column; 
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;

#[Entity()]
#[Table(name: 'locacao')]
class Locacao {

    #[Id]
    #[Column(type: "integer"), GeneratedValue]
    private $id;

    #[Column(type: "date")]
    private $emissao;

    #[Column(type: "date")]
    private $devolucao;

    #[Column(type: "float")]
    private $valor;

    #[ORM\ManyToOne(targetEntity: Filme::class, cascade:['persist', 'remove'], fetch:'EAGER')]
    #[ORM\JoinColumn(name: 'filme_id', referencedColumnName: 'id')]
    private $filme;

    #[ORM\ManyToOne(targetEntity: Cliente::class, cascade:['persist', 'remove'], fetch:'EAGER')]
    #[ORM\JoinColumn(name: 'cliente_id', referencedColumnName: 'id')]
    private $cliente;

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
