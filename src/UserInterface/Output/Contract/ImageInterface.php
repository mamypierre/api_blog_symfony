<?php

namespace App\UserInterface\Output\Contract;

interface ImageInterface
{
    public function getTitle(): string;
    public function setTitle(string $title): ImageInterface;

    public function getType(): string;
    public function setType(string $type): ImageInterface;

    public function getDimension(): string;
    public function setDimension(string $dimension): ImageInterface;
}