<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table(name="comentarios", indexes={@ORM\Index(name="coIdUsuarioFK", columns={"coIdUsuarioFK"})})
 * @ORM\Entity
 */
class Comentario
{
    /**
     * @var int
     *
     * @ORM\Column(name="coId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coTitle", type="string", length=255, nullable=true)
     */
    private $cotitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coComentario", type="text", length=65535, nullable=true)
     */
    private $cocomentario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coPagina", type="string", length=45, nullable=true)
     */
    private $copagina;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="coCreated_at", type="datetime", nullable=true)
     */
    private $cocreatedAt;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="coDelete_at", type="datetime", nullable=true)
     */
    private $codeleteAt;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="Comentarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="coIdUsuarioFK", referencedColumnName="uId")
     * })
     */
    private $coidusuariofk;

    public function getCoid(): ?int
    {
        return $this->coid;
    }

    public function getCotitle(): ?string
    {
        return $this->cotitle;
    }

    public function setCotitle(?string $cotitle): self
    {
        $this->cotitle = $cotitle;

        return $this;
    }

    public function getCocomentario(): ?string
    {
        return $this->cocomentario;
    }

    public function setCocomentario(?string $cocomentario): self
    {
        $this->cocomentario = $cocomentario;

        return $this;
    }

    public function getCopagina(): ?string
    {
        return $this->copagina;
    }

    public function setCopagina(?string $copagina): self
    {
        $this->copagina = $copagina;

        return $this;
    }

    public function getCocreatedAt(): ?\DateTimeInterface
    {
        return $this->cocreatedAt;
    }

    public function setCocreatedAt(?\DateTimeInterface $cocreatedAt): self
    {
        $this->cocreatedAt = $cocreatedAt;

        return $this;
    }

    public function getCodeleteAt(): ?\DateTimeInterface
    {
        return $this->codeleteAt;
    }

    public function setCodeleteAt(?\DateTimeInterface $codeleteAt): self
    {
        $this->codeleteAt = $codeleteAt;

        return $this;
    }

    public function getCoidusuariofk(): ?Usuario
    {
        return $this->coidusuariofk;
    }

    public function setCoidusuariofk(?Usuario $coidusuariofk): self
    {
        $this->coidusuariofk = $coidusuariofk;

        return $this;
    }


}
