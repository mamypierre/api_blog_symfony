<?php

namespace App\Infrastructure\Doctrine\Entity;

use App\Domain\Contract\Entity\Image\ImageInterface;
use App\Infrastructure\Doctrine\Entity\Trai\Timestamp;
use App\Infrastructure\Doctrine\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[ORM\HasLifecycleCallbacks()]
class Image implements ImageInterface
{
    use Timestamp;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $title ;

    #[ORM\Column(length: 255)]
    private string $type ;

    #[ORM\Column(length: 255)]
    private string $name ;

    #[ORM\Column(length: 255)]
    protected string $path ;

    #[ORM\Column]
    private ?int $width = null;

    #[ORM\Column]
    private ?int $height = null;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(name: 'updated_at', type: 'datetime_immutable')]
    private $updatedAt;

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Image
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Image
     */
    public function setType(string $type): self
    {
        $types = self::TYPES;
        if (in_array($type, $types, true)){
            $this->type = $type;
        }
        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

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

}