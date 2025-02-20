<?php

namespace Entity;

use Doctrine\ORM\Mapping\Column; 
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;

#[Entity()]
#[Table(name: 'cliente')]
class Cliente {

    #[Id]
    #[Column(type: "integer"), GeneratedValue]
    private $id;

    #[Column(type: "string")]
    private $nome;

    #[Column(type: "string")]
    private $endereco;

    #[Column(type: "string")]
    private $telefone;

    #[ORM\OneToMany(targetEntity: Locacao::class, mappedBy: 'cliente')]
    private $locacoes;

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
