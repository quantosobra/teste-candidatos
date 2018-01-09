<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venda
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\AppBundle\Repository\VendaRepository")
 */
class Venda
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime")
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal")
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="comissao", type="decimal")
     */
    private $comissao;

    /**
     * @var Empresa
     *
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="vendas")
     * @ORM\JoinColumn(name="empresa_id", referencedColumnName="id")
     */
    private $empresa;

    /**
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="compras")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    private $cliente;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     *
     * @return Venda
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set valor
     *
     * @param string $valor
     *
     * @return Venda
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set comissao
     *
     * @param string $comissao
     *
     * @return Venda
     */
    public function setComissao($comissao)
    {
        $this->comissao = $comissao;

        return $this;
    }

    /**
     * Get comissao
     *
     * @return string
     */
    public function getComissao()
    {
        return $this->comissao;
    }
}
