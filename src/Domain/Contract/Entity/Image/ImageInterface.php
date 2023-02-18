<?php

namespace App\Domain\Contract\Entity\Image;

interface ImageInterface
{
    const TYPE_THUMBNAIL = 'thumbnail';
    public const TYPES = [
        self::TYPE_THUMBNAIL => self::TYPE_THUMBNAIL
    ];

    public function getTitle(): ?string;

    public function setTitle(string $title): self;

    public function getType(): ?string;

    public function setType(string $type): self;


    public function getName(): ?string;

    public function setName(string $name): self;

    public function getPath(): ?string;

    public function setPath(string $path): self;

    public function getWidth(): ?int;

    public function setWidth(int $width): self;

    public function getHeight(): ?int;

    public function setHeight(int $height): self;
}