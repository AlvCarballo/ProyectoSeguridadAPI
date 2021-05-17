<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="Usuarios")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="uId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uUsuario", type="string", length=45, nullable=true)
     */
    private $uusuario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uPassword", type="string", length=255, nullable=true)
     */
    private $upassword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uNombre", type="string", length=45, nullable=true)
     */
    private $unombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uApellidos", type="string", length=150, nullable=true)
     */
    private $uapellidos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uEmail", type="string", length=45, nullable=true)
     */
    private $uemail;

    /**
     * @var int|null
     *
     * @ORM\Column(name="uTelefono", type="integer", nullable=true)
     */
    private $utelefono;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uDireccion", type="string", length=45, nullable=true)
     */
    private $udireccion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comentario", mappedBy="coidusuariofk")
     */
    private $comentarios;

    public function __construct(){
        $this->comentarios=new ArrayCollection();
    }

    public function getUid(): ?int
    {
        return $this->uid;
    }

    public function getUusuario(): ?string
    {
        return $this->uusuario;
    }

    public function setUusuario(?string $uusuario): self
    {
        $this->uusuario = $uusuario;

        return $this;
    }

    public function getUpassword(): ?string
    {
        return $this->upassword;
    }

    public function setUpassword(?string $upassword): self
    {
        $this->upassword = $upassword;

        return $this;
    }

    public function getUnombre(): ?string
    {
        return $this->unombre;
    }

    public function setUnombre(?string $unombre): self
    {
        $this->unombre = $unombre;

        return $this;
    }

    public function getUapellidos(): ?string
    {
        return $this->uapellidos;
    }

    public function setUapellidos(?string $uapellidos): self
    {
        $this->uapellidos = $uapellidos;

        return $this;
    }

    public function getUemail(): ?string
    {
        return $this->uemail;
    }

    public function setUemail(?string $uemail): self
    {
        $this->uemail = $uemail;

        return $this;
    }

    public function getUtelefono(): ?int
    {
        return $this->utelefono;
    }

    public function setUtelefono(?int $utelefono): self
    {
        $this->utelefono = $utelefono;

        return $this;
    }

    public function getUdireccion(): ?string
    {
        return $this->udireccion;
    }

    public function setUdireccion(?string $udireccion): self
    {
        $this->udireccion = $udireccion;

        return $this;
    }
    /**
     * @return Collection|Comentario[]
     */
    public function getComentarios2()
    {
        return $this->comentarios;
    }
}
