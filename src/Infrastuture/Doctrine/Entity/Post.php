<?php

namespace App\Infrastuture\Doctrine\Entity;

use App\Domain\Contract\Entity\Image\ImageInterface;
use App\Domain\Contract\Entity\Post\PostInterface;

class Post implements PostInterface
{

    protected string $title;
    protected ?string $shortDescription = null;
    /**
     * @todo collection
     */
    protected array $images = [];

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Post
     */
    public function setTitle(string $title): Post
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
    public function setShortDescription(string $shortDescription = null): Post
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * @return array //ArrayObject< ImageInterface >
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array $images
     * @return Post
     */
    public function addImage(ImageInterface $image): Post
    {
        $images = $this->images;
        if (!array_search($image, $images, true)) {
            $this->images[] = $image;
        }
        return $this;
    }
}