<?php

namespace App\UserInterface\Output\Contract\Post;


interface PostInterface extends PostPreviewInterface
{
    public function getContent(): ?string;

    public function setContent(?string $content = null): self;

    public function getDescription(): ?string;

    public function setDescription(?string $description = null): self;
}