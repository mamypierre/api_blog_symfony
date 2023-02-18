<?php
namespace App\Domain\Contract\Entity\Post;

use App\Domain\Contract\Entity\CreateUpdateDateInterface;
use App\Domain\Contract\Entity\Image\ImageInterface;

interface LastAdded extends CreateUpdateDateInterface
{
    public function getTitle(): string;
    public function setTitle(string $title): self;
    public function getShortDescription(): ?string;
    public function setShortDescription(string $shortDescription = null): self;

    /**
     * @return ImageInterface []
     */
    public function getImages();
    public function addImage(ImageInterface $image): self;
    public function removeImage(ImageInterface $image): self;

}