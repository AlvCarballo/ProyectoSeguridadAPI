<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table(name="comentarios", indexes={@ORM\Index(name="uId_idx", columns={"coIdUsuarioFK"})})
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
     * @ORM\Column(name="coComentario", type="string", length=256, nullable=true)
     */
    private $cocomentario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coPagina", type="string", length=45, nullable=true)
     */
    private $copagina;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="comentarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="coIdUsuarioFK", referencedColumnName="uId")
     * })
     */
    private $coidusuariofk;

    public function getCoid(): ?int
    {
        return $this->coid;
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
