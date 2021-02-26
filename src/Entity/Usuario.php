<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario_k;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario_a;

    /**
     * @ORM\OneToMany(targetEntity=UsuDisp::class, mappedBy="usuario")
     */
    private $usuDisps;

    public function __construct()
    {
        $this->usuDisps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUsuarioK(): ?int
    {
        return $this->id_usuario_k;
    }

    public function setIdUsuarioK(int $id_usuario_k): self
    {
        $this->id_usuario_k = $id_usuario_k;

        return $this;
    }

    public function getIdUsuarioA(): ?int
    {
        return $this->id_usuario_a;
    }

    public function setIdUsuarioA(int $id_usuario_a): self
    {
        $this->id_usuario_a = $id_usuario_a;

        return $this;
    }

    /**
     * @return Collection|UsuDisp[]
     */
    public function getUsuDisps(): Collection
    {
        return $this->usuDisps;
    }

    public function addUsuDisp(UsuDisp $usuDisp): self
    {
        if (!$this->usuDisps->contains($usuDisp)) {
            $this->usuDisps[] = $usuDisp;
            $usuDisp->setUsuario($this);
        }

        return $this;
    }

    public function removeUsuDisp(UsuDisp $usuDisp): self
    {
        if ($this->usuDisps->removeElement($usuDisp)) {
            // set the owning side to null (unless already changed)
            if ($usuDisp->getUsuario() === $this) {
                $usuDisp->setUsuario(null);
            }
        }

        return $this;
    }
}
