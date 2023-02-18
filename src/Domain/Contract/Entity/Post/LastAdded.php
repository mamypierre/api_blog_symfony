<?php
namespace App\Domain\Contract\Entity\Post;

use App\Domain\Contract\Entity\Image\ImageInterface;

interface LastAdded
{
    public function getTitle(): string;
    public function setTitle(string $title): LastAdded;
    public function getShortDescription(): ?string;
    public function setShortDescription(string $shortDescription = null): LastAdded;

    /**
     * @return ImageInterface []
     */
    public function getImages(): array;
    public function addImage(ImageInterface $image): LastAdded;
}