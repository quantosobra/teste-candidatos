<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Empresa
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\AppBundle\Repository\EmpresaRepository")
 */
class Empresa
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
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=11)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=500)
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="imagem", type="string", length=100, nullable=true)
     */
    private $imagem;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Venda", mappedBy="empresa")
     */
    private $vendas;

    /**
     * Construtor.
     */
    public function __construct()
    {
        $this->vendas = new ArrayCollection();
    }

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
     * Set nome
     *
     * @param string $nome
     *
     * @return Empresa
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Empresa
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Empresa
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Empresa
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Empresa
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set imagem
     *
     * @param string $imagem
     *
     * @return Empresa
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get imagem
     *
     * @return string
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set vendas
     *
     * @param ArrayCollection $vendas
     *
     * @return Empresa
     */
    public function setVendas($vendas)
    {
        $this->vendas = $vendas;

        return $this;
    }

    /**
     * Get vendas
     *
     * @return ArrayCollection
     */
    public function getVendas()
    {
        return $this->vendas;
    }
}
