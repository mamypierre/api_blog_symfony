<?php

namespace App\UserInterface\Output\Contract;

interface ImageInterface extends CreateUpdateDateInterface
{
    public function getTitle(): string;
    public function setTitle(string $title): ImageInterface;

    public function getType(): string;
    public function setType(string $type): ImageInterface;

    public function getName(): ?string;

    public function setName(string $name): self;

    public function getUri(): ?string;

    public function setUri(string $path): self;

    public function getWidth(): ?int;

    public function setWidth(int $width): self;

    public function getHeight(): ?int;

    public function setHeight(int $height): self;
}