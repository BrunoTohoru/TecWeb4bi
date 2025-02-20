<?php

namespace Entity;

use Doctrine\ORM\Mapping\Column; 
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;

#[Entity()]
#[Table(name: 'filme')]
class Filme {

    #[Id]
    #[Column(type: "integer"), GeneratedValue]
    private $id;

    #[Column(type: "string")]
    private $nome;

    #[Column(type: "integer")]
    private $ano;

    #[Column(type: "integer")]
    private $duracao;

    #[Column(type: "string")]
    private $foto;

    #[Column(type: "string")]
    private $sinopse;

    #[ORM\ManyToOne(targetEntity: Estilo::class, inversedBy: 'filmes')]
    #[ORM\JoinColumn(name: 'estilo_id', referencedColumnName: 'id')]
    private $estilo;

    #[ORM\OneToMany(targetEntity: Locacao::class, mappedBy: 'filme')]
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