<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="dataCompra", type="datetime")
     * 
     * @Assert\NotBlank(
     *     message = "O preenchimento da data da compra é obrigatório.",
     * )
     * 
     * @Assert\DateTime(
     *     message = "Data inválida."
     * )
     * 
     */
    private $dataCompra;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal")
     * 
     * @Assert\NotBlank(
     *     message = "O preenchimento do valor é obrigatório.",
     * )
     * 
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="comissao", type="decimal")
     * 
     * @Assert\NotBlank(
     *     message = "O preenchimento da comissão é obrigatório.",
     * )
     * 
     */
    private $comissao;

    /**
     * @var Empresa
     *
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="vendas")
     * @ORM\JoinColumn(name="empresa_id", referencedColumnName="id")
     * 
     * @Assert\NotBlank(
     *     message = "Uma empresa deve ser selecionada.",
     * )
     * 
     */
    private $empresa;

    /**
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="compras")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     * 
     * @Assert\NotBlank(
     *     message = "Um cliente deve ser selecionado.",
     * )
     * 
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
     * Set dataCompra
     *
     * @param \DateTime $dataCompra
     *
     * @return Venda
     */
    public function setDataCompra($dataCompra)
    {
        $this->dataCompra = $dataCompra;

        return $this;
    }

    /**
     * Get dataCompra
     *
     * @return \DateTime
     */
    public function getDataCompra()
    {
        return $this->dataCompra;
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


    /**
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Venda
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set cliente
     *
     * @param string $cliente
     *
     * @return Venda
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string
     */
    public function getCliente()
    {
        return $this->cliente;
    }
}