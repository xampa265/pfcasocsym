<?php

namespace App\Entity;

use App\Repository\MovimientosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovimientosRepository::class)]
class Movimientos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 1)]
    private $tipo;

    #[ORM\Column(type: 'float')]
    private $importe;

    #[ORM\Column(type: 'integer')]
    private $mes;

    #[ORM\Column(type: 'string', length: 25)]
    private $numeroPedido;

    #[ORM\Column(type: 'string', length: 25)]
    private $categoria;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $descripcion;

    #[ORM\Column(type: 'float')]
    private $saldo;

    #[ORM\Column(type: 'string', length: 20)]
    private $fecha;

    #[ORM\ManyToOne(targetEntity: Cuenta::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $cuenta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getImporte(): ?float
    {
        return $this->importe;
    }

    public function setImporte(float $importe): self
    {
        $this->importe = $importe;

        return $this;
    }

    public function getMes(): ?int
    {
        return $this->mes;
    }

    public function setMes(int $mes): self
    {
        $this->mes = $mes;

        return $this;
    }

    public function getNumeroPedido(): ?string
    {
        return $this->numeroPedido;
    }

    public function setNumeroPedido(string $numeroPedido): self
    {
        $this->numeroPedido = $numeroPedido;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getSaldo(): ?float
    {
        return $this->saldo;
    }

    public function setSaldo(float $saldo): self
    {
        $this->saldo = $saldo;

        return $this;
    }

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getCuenta(): ?cuenta
    {
        return $this->cuenta;
    }

    public function setCuenta(?cuenta $cuenta): self
    {
        $this->cuenta = $cuenta;

        return $this;
    }
}
