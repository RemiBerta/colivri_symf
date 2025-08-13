<?php

namespace App\Entity;

use App\Repository\ListingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListingRepository::class)]
class Listing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 500)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $pricePerMonth = null;

    #[ORM\Column]
    private ?int $maximumCapacity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPricePerMonth(): ?int
    {
        return $this->pricePerMonth;
    }

    public function setPricePerMonth(int $pricePerMonth): static
    {
        $this->pricePerMonth = $pricePerMonth;

        return $this;
    }

    public function getMaximumCapacity(): ?int
    {
        return $this->maximumCapacity;
    }

    public function setMaximumCapacity(int $maximumCapacity): static
    {
        $this->maximumCapacity = $maximumCapacity;

        return $this;
    }
}
