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
     * @ORM\ManyToMany(targetEntity="Dispositivos", inversedBy="usuarios", fetch="EAGER")
     * @ORM\JoinTable(name="UsuDisp",
     *  joinColumns={@ORM\JoinColumn(name="usuario_id", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="dispositivo_id", referencedColumnName="id")}
     *  )
     */
    private $dispositivos;

    public function __construct()
    {
        $this->dispositivos = new ArrayCollection();
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
     * @return Collection|Dispositivos[]
     */
    public function getDispositivos(): Collection
    {
        return $this->dispositivos;
    }

    public function setDispositivos(ArrayCollection $dispositivos)
    {
      $this->dispositivos = new ArrayCollection();
      if (is_null($dispositivos)) {
          return;
      }
  
      foreach ($dispositivos as $dispositivo) {
          $this->addDispositivo($dispositivo);
      }
  
      return $this;
    }
  
    public function addDispositivo(Dispositivo $dispositivo): self
    {
        if (!$this->dispositivos->contains($dispositivo)) {
            $this->dispositivos[] = $dispositivo;

        }
        return $this;
    }

    public function removeDispositivo(Dispositivo $dispositivo): self
    {
        if ($this->dispositivos->contains($dispositivo)) {
            $this->dispositivos->removeElement($dispositivo);
            $dispositivo->removeGroupe($this);
        }
        return $this;
    }
}
