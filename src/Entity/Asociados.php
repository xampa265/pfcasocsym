<?php

namespace App\Entity;

use App\Repository\AsociadosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AsociadosRepository::class)]
class Asociados
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 25)]
    private $nombre;

    #[ORM\Column(type: 'string', length: 100)]
    private $apellidos;

    #[ORM\Column(type: 'string', length: 9)]
    private $dni;

    #[ORM\Column(type: 'string', length: 9, nullable: true)]
    private $telefono;

    #[ORM\Column(type: 'string', length: 30)]
    private $poblacion;

    #[ORM\Column(type: 'string', length: 30)]
    private $provincia;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $email;

    #[ORM\Column(type: 'string', length: 24)]
    private $cuenta;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $profesion;

    #[ORM\Column(type: 'string', length: 4)]
    private $anyo_nac;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getPoblacion(): ?string
    {
        return $this->poblacion;
    }

    public function setPoblacion(string $poblacion): self
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCuenta(): ?string
    {
        return $this->cuenta;
    }

    public function setCuenta(string $cuenta): self
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    public function getProfesion(): ?string
    {
        return $this->profesion;
    }

    public function setProfesion(?string $profesion): self
    {
        $this->profesion = $profesion;

        return $this;
    }

    public function getAnyoNac(): ?string
    {
        return $this->anyo_nac;
    }

    public function setAnyoNac(string $anyo_nac): self
    {
        $this->anyo_nac = $anyo_nac;

        return $this;
    }
}
