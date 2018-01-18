<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Misd\PhoneNumberBundle\Validator\Constraints as MisdAssert;

/**
 * Cliente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\AppBundle\Repository\ClienteRepository")
 */
class Cliente
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
     * @ORM\Column(name="nome", type="string", length=200)
     * 
     * @Assert\NotBlank(
     *     message = "O preenchimento do nome é obrigatório.",
     * )
     * 
     * @Assert\Length(
     *      min = 2,
     *      max = 200,
     *      minMessage = "O nome precisa ter pelo menos {{ limit }} caracteres.",
     *      maxMessage = "O nome não pode ser maior que {{ limit }} caracteres."
     * )
     * 
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=11)
     * 
     * @Assert\NotBlank(
     *     message = "O preenchimento do telefone é obrigatório.",
     * )
     * 
     * @MisdAssert\PhoneNumber(
     *      defaultRegion="BR",
     *      message = "Telefone inválido.",
     * )
     * 
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * 
     * @Assert\NotBlank(
     *     message = "O preenchimento do email é obrigatório.",
     * )
     * 
     * @Assert\Email(
     *     message = "O email '{{ value }}' não é um e-mail válido.",
     *     checkMX = true
     * )
     * 
     */
     
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=500)
     *
     * @Assert\NotBlank(
     *     message = "O preenchimento do endereço é obrigatório.",
     * )
     * 
     * @Assert\Length(
     *      min = 2,
     *      max = 500,
     *      minMessage = "O endereço precisa ter pelo menos {{ limit }} caracteres",
     *      maxMessage = "O endereço não pode ser maior que {{ limit }} caracteres"
     * )
     * 
     */
    private $endereco;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Venda", mappedBy="cliente")
     * 
     */
    private $compras;

    /**
     * Construtor.
     */
    public function __construct()
    {
        $this->compras = new ArrayCollection();
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * Set compras
     *
     * @param ArrayCollection $compras
     *
     * @return Cliente
     */
    public function setCompras($compras)
    {
        $this->compras = $compras;

        return $this;
    }

    /**
     * Get compras
     *
     * @return ArrayCollection
     */
    public function getComprs()
    {
        return $this->compras;
    }
}
