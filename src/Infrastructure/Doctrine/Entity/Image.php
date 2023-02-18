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
    protected string $dimension ;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Image
     */
    public function setTitle(string $title): Image
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
    public function setType(string $type): Image
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getDimension(): string
    {
        return $this->dimension;
    }

    /**
     * @param string $dimension
     * @return Image
     */
    public function setDimension(string $dimension): Image
    {
        $this->dimension = $dimension;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

}