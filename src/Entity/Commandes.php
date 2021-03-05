<?php

namespace App\Entity;

use App\Repository\CommandesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandesRepository::class)
 */
class Commandes
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
    private $amountCommande;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCommande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmountCommande(): ?int
    {
        return $this->amountCommande;
    }

    public function setAmountCommande(int $amountCommande): self
    {
        $this->amountCommande = $amountCommande;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }
}
