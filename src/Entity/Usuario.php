<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Usuario
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity
 */
class Usuario implements UserInterface
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
     * @var int|null
     *
     * @ORM\Column(name="uRole", type="integer", nullable=true)
     */
    private $urole;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uNombre", type="string", length=100, nullable=true)
     */
    private $unombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uApellidos", type="string", length=200, nullable=true)
     */
    private $uapellidos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uEmail", type="string", length=255, nullable=true)
     */
    private $uemail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uPassword", type="string", length=255, nullable=true)
     */
    private $upassword;

    /**
     * @var int|null
     *
     * @ORM\Column(name="uTelefono", type="integer", nullable=true)
     */
    private $utelefono;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uDireccion", type="string", length=255, nullable=true)
     */
    private $udireccion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="uCreated_at", type="datetime", nullable=true)
     */
    private $ucreatedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="uDelete_at", type="datetime", nullable=true)
     */
    private $udeleteAt;

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

    public function getUrole(): ?int
    {
        return $this->urole;
    }

    public function setUrole(?int $urole): self
    {
        $this->urole = $urole;

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

    public function getUpassword(): ?string
    {
        return $this->upassword;
    }

    public function setUpassword(?string $upassword): self
    {
        $this->upassword = $upassword;

        return $this;
    }
    public function getPassword(): ?string
    {
        return $this->upassword;
    }

    public function setPassword(?string $upassword): self
    {
        $this->upassword = $upassword;

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

    public function getUcreatedAt(): ?\DateTimeInterface
    {
        return $this->ucreatedAt;
    }

    public function setUcreatedAt(?\DateTimeInterface $ucreatedAt): self
    {
        $this->ucreatedAt = $ucreatedAt;

        return $this;
    }

    public function getUdeleteAt(): ?\DateTimeInterface
    {
        return $this->udeleteAt;
    }

    public function setUdeleteAt(?\DateTimeInterface $udeleteAt): self
    {
        $this->udeleteAt = $udeleteAt;

        return $this;
    }

    /**
     * @return Collection|Comentario[]
     */
    public function getComentarios(): Collection
    {
        return $this->comentarios;
    }

    public function getUsername(){
		return $this->email;
	}

    public function getRoles(){
		return array(2);
	}
    public function getSalt(){
		return null;
	}
    public function eraseCredentials(){}


}
