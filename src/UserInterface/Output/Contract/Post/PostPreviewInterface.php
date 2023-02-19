<?php

namespace App\UserInterface\Output\Contract\Post;

use App\UserInterface\Output\Contract\ImageInterface;
use App\UserInterface\Output\Contract\CreateUpdateDateInterface;

interface PostPreviewInterface extends CreateUpdateDateInterface
{
    public function getTitle(): string;
    public function setTitle(string $title): self;
    public function getShortDescription(): ?string;
    public function setShortDescription(string $shortDescription = null): self;
    /**
     * @return array
     */
    public function getImages(): array;
    public function addImage(ImageInterface $image): self;
    public function getUrl(): string;
    public function setUrl(string $url): self;
}