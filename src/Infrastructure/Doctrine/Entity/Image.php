<?php

namespace App\Infrastructure\Doctrine\Entity;

use App\Domain\Contract\Entity\Image\ImageInterface;
use App\Infrastructure\Doctrine\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image implements ImageInterface
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    protected string $title ;

    #[ORM\Column(length: 255)]
    protected string $type ;

    #[ORM\Column(length: 255)]
    protected string $name ;

    #[ORM\Column(length: 255)]
    protected string $path ;

    #[ORM\Column]
    private ?int $width = null;

    #[ORM\Column]
    private ?int $height = null;


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

}