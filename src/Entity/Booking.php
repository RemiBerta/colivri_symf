<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $beginningDate = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(nullable: true)]
    private ?int $finalPrice = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginningDate(): ?\DateTime
    {
        return $this->beginningDate;
    }

    public function setBeginningDate(\DateTime $beginningDate): static
    {
        $this->beginningDate = $beginningDate;

        return $this;
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

    public function getFinalPrice(): ?int
    {
        return $this->finalPrice;
    }

    public function setFinalPrice(?int $finalPrice): static
    {
        $this->finalPrice = $finalPrice;

        return $this;
    }
}
