<?php

namespace App\Infrastructure\Doctrine\Entity;

use App\Domain\Contract\Entity\Image\ImageInterface;
use App\Domain\Contract\Entity\Post\PostInterface;
use App\Infrastructure\Doctrine\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post implements PostInterface
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    protected string $title;
    #[ORM\Column(length: 255, nullable: true)]
    protected ?string $shortDescription = null;
    /**
     * @todo collection
     */
    #[ORM\ManyToMany(targetEntity: Image::class, inversedBy: 'posts')]
    protected Collection $images ;

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
}