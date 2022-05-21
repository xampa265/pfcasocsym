<?php

namespace App\Entity;

use App\Repository\CuentaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CuentaRepository::class)]
class Cuenta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 25)]
    private $alias;

    #[ORM\Column(type: 'string', length: 24)]
    private $iban;

    #[ORM\Column(type: 'string', length: 100)]
    private $titular;

    #[ORM\Column(type: 'string', length: 100)]
    private $autorizadoPrincipal;

    #[ORM\Column(type: 'string', length: 100)]
    private $autorizadoSecundario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getTitular(): ?string
    {
        return $this->titular;
    }

    public function setTitular(string $titular): self
    {
        $this->titular = $titular;

        return $this;
    }

    public function getAutorizadoPrincipal(): ?string
    {
        return $this->autorizadoPrincipal;
    }

    public function setAutorizadoPrincipal(string $autorizadoPrincipal): self
    {
        $this->autorizadoPrincipal = $autorizadoPrincipal;

        return $this;
    }

    public function getAutorizadoSecundario(): ?string
    {
        return $this->autorizadoSecundario;
    }

    public function setAutorizadoSecundario(string $autorizadoSecundario): self
    {
        $this->autorizadoSecundario = $autorizadoSecundario;

        return $this;
    }
}
