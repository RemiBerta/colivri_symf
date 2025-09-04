<?php

namespace App\Entity;

use App\Repository\ListingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ListingRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['listing:read']],
    denormalizationContext: ['groups' => ['listing:write']]
)]
class Listing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['listing:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['listing:read'])]
    private ?string $title = null;

    #[ORM\Column(length: 500)]
    #[Groups(['listing:read'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(['listing:read'])]
    private ?int $pricePerMonth = null;

    #[ORM\Column]
    #[Groups(['listing:read'])]
    private ?int $maximumCapacity = null;

    #[ORM\ManyToOne(inversedBy: 'listings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    /**
     * @var Collection<int, Chatroom>
     */
    #[ORM\OneToMany(targetEntity: Chatroom::class, mappedBy: 'listing')]
    private Collection $chatrooms;

    /**
     * @var Collection<int, Booking>
     */
    #[ORM\OneToMany(targetEntity: Booking::class, mappedBy: 'listing')]
    private Collection $bookings;

    /**
     * @var Collection<int, Review>
     */
    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'listing')]
    #[Groups(['listing:read'])]
    private Collection $reviews;

    #[ORM\OneToOne(inversedBy: 'listing', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['listing:read'])]
    private ?Adress $adress = null;

    /**
     * @var Collection<int, Fonctionality>
     */
    #[ORM\ManyToMany(targetEntity: Fonctionality::class, inversedBy: 'listings')]
    #[Groups(['listing:read'])]
    private Collection $fonctionality;

    /**
     * @var Collection<int, Picture>
     */
    #[ORM\OneToMany(targetEntity: Picture::class, mappedBy: 'listing')]
    #[Groups(['listing:read'])]
    private Collection $pictures;

    public function __construct()
    {
        $this->chatrooms = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->fonctionality = new ArrayCollection();
        $this->pictures = new ArrayCollection();
    }

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Chatroom>
     */
    public function getChatrooms(): Collection
    {
        return $this->chatrooms;
    }

    public function addChatroom(Chatroom $chatroom): static
    {
        if (!$this->chatrooms->contains($chatroom)) {
            $this->chatrooms->add($chatroom);
            $chatroom->setListing($this);
        }

        return $this;
    }

    public function removeChatroom(Chatroom $chatroom): static
    {
        if ($this->chatrooms->removeElement($chatroom)) {
            // set the owning side to null (unless already changed)
            if ($chatroom->getListing() === $this) {
                $chatroom->setListing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Booking>
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): static
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings->add($booking);
            $booking->setListing($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): static
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getListing() === $this) {
                $booking->setListing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setListing($this);
        }

        return $this;
    }

    public function removeReview(Review $review): static
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getListing() === $this) {
                $review->setListing(null);
            }
        }

        return $this;
    }

    public function getAdress(): ?Adress
    {
        return $this->adress;
    }

    public function setAdress(Adress $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * @return Collection<int, Fonctionality>
     */
    public function getFonctionality(): Collection
    {
        return $this->fonctionality;
    }

    public function addFonctionality(Fonctionality $fonctionality): static
    {
        if (!$this->fonctionality->contains($fonctionality)) {
            $this->fonctionality->add($fonctionality);
        }

        return $this;
    }

    public function removeFonctionality(Fonctionality $fonctionality): static
    {
        $this->fonctionality->removeElement($fonctionality);

        return $this;
    }

    /**
     * @return Collection<int, Picture>
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): static
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures->add($picture);
            $picture->setListing($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): static
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getListing() === $this) {
                $picture->setListing(null);
            }
        }

        return $this;
    }
}
