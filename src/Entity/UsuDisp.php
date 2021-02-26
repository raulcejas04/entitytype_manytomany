<?php

namespace App\Entity;

use App\Repository\UsuDispRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuDispRepository::class)
 */
class UsuDisp
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_usuario;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_dispositivo;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="usuDisps")
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity=Dispositivos::class, inversedBy="usuDisps")
     */
    private $dispositivos;

    public function getIdUsuario(): ?int
    {
        return $this->id_usuario;
    }

    public function getIdDispositivo(): ?int
    {
        return $this->id_dispositivo;
    }

    public function setIdDispositivo(int $id_dispositivo): self
    {
        $this->id_dispositivo = $id_dispositivo;

        return $this;
    }

    public function getUsuario(): ?usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getDispositivos(): ?dispositivos
    {
        return $this->dispositivos;
    }

    public function setDispositivos(?dispositivos $dispositivos): self
    {
        $this->dispositivos = $dispositivos;

        return $this;
    }
}
