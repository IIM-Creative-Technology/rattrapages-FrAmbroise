<?php

namespace App\Entity;

use App\Entity\User;

use App\Repository\DeliveryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeliveryRepository::class)]
class Delivery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'deliveries')]
    private ?User $userid = null;

    #[ORM\Column(length: 255)]
    private ?string $Salad = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $drink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $desert = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getUserid(): ?User
    {

        return $this->userid;
    }

    public function setUserid(?User $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getSalad(): ?string
    {
        return $this->Salad;
    }

    public function setSalad(string $Salad): static
    {
        $this->Salad = $Salad;

        return $this;
    }

    public function getDrink(): ?string
    {
        return $this->drink;
    }

    public function setDrink(?string $drink): static
    {
        $this->drink = $drink;

        return $this;
    }

    public function getDesert(): ?string
    {
        return $this->desert;
    }

    public function setDesert(?string $desert): static
    {
        $this->desert = $desert;

        return $this;
    }
}
