<?php

namespace App\Domain\Contract\Entity\Post;

interface PostInterface extends LastAddedInterface
{
    public function getContent(): ?string;

    public function setContent(?string $content = null): self;

    public function getDescription(): ?string;

    public function setDescription(?string $description = null): self;
}