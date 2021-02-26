<?php

namespace App\Entity;

use App\Repository\DispositivosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DispositivosRepository::class)
 */
class Dispositivos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity=UsuDisp::class, mappedBy="dispositivos")
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

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
            $usuDisp->setDispositivos($this);
        }

        return $this;
    }

    public function removeUsuDisp(UsuDisp $usuDisp): self
    {
        if ($this->usuDisps->removeElement($usuDisp)) {
            // set the owning side to null (unless already changed)
            if ($usuDisp->getDispositivos() === $this) {
                $usuDisp->setDispositivos(null);
            }
        }

        return $this;
    }
}
