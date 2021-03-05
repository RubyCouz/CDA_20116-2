<?php

namespace App\Entity;

use App\Repository\PaiementsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementsRepository::class)
 */
class Paiements
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $infosPaiement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $methodPaiement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfosPaiement(): ?string
    {
        return $this->infosPaiement;
    }

    public function setInfosPaiement(string $infosPaiement): self
    {
        $this->infosPaiement = $infosPaiement;

        return $this;
    }

    public function getMethodPaiement(): ?string
    {
        return $this->methodPaiement;
    }

    public function setMethodPaiement(string $methodPaiement): self
    {
        $this->methodPaiement = $methodPaiement;

        return $this;
    }
}
