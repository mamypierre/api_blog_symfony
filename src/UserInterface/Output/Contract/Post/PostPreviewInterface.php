<?php

namespace App\UserInterface\Output\Contract\Post;

use App\UserInterface\Output\Contract\ImageInterface;
use ArrayObject;

interface PostPreviewInterface
{
    public function getTitle(): string;
    public function setTitle(string $title): PostPreviewInterface;
    public function getShortDescription(): ?string;
    public function setShortDescription(string $shortDescription = null): PostPreviewInterface;

    /**
     * @return array
     */
    public function getImages(): array;
    public function addImage(ImageInterface $image): PostPreviewInterface;
}