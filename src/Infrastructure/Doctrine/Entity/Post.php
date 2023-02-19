<?php

namespace App\Infrastructure\Doctrine\Entity;

use App\Domain\Contract\Entity\Image\ImageInterface;
use App\Domain\Contract\Entity\Post\PostInterface;
use App\Infrastructure\Doctrine\Entity\Trai\Timestamp;
use App\Infrastructure\Doctrine\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
#[ORM\HasLifecycleCallbacks()]
class Post implements PostInterface
{
    use Timestamp;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $title;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $shortDescription = null;
    /**
     * @todo collection
     */
    #[ORM\ManyToMany(targetEntity: Image::class, inversedBy: 'posts')]
    private Collection $images ;

    /**
     * @ORM\Column(type="datetime_immutable", name="created_at")
     */
    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(name: 'updated_at', type: 'datetime_immutable')]
    private $updatedAt;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Post
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    /**
     * @param string|null $shortDescription
     * @return Post
     */
    public function setShortDescription(string $shortDescription = null): self
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }


    public function getImages(): Collection
    {
        return $this->images;
    }


    public function addImage(ImageInterface $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
        }
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function removeImage(ImageInterface $image): self
    {
        $this->images->removeElement($image);

        return $this;
    }


    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
    }
}