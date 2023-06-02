<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assets;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new Post()
    ],
    normalizationContext:['groups'=>['club:read']],
    denormalizationContext:['groups'=>['club:write']]
)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['club:write','club:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assets\NotBlank]
    #[Assets\Length(min: 3,max: 255, minMessage: 'name needs to have at least 3 chars',maxMessage: 'name needs to have less then 255 characters')]
    #[Groups(['club:write','club:read'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assets\NotBlank]
    #[Groups(['club:write','club:read'])]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['club:write','club:read'])]
    private ?string $address = null;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: User::class,cascade: ['persist'])]
    #[Groups(['club:write','club:read'])]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setClub($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getClub() === $this) {
                $user->setClub(null);
            }
        }

        return $this;
    }
}
