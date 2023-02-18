<?php

namespace App\UserInterface\Output\Model;

use App\UserInterface\Output\Contract\ImageInterface;
use DateTimeImmutable;

class Image implements ImageInterface
{

    protected string $title;

    protected string $type;
    protected DateTimeImmutable $updatedAt;
    protected DateTimeImmutable $createdAt;
    protected string $name;
    protected string $uri;
    protected int $width;
    protected int $height;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Image
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Image
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }


    /**
     * @return DateTimeImmutable
     */
    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeImmutable $updatedAt
     */
    public function setUpdatedAt(DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri(string $uri): self
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @return string
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param string $width
     */
    public function setWidth(int $width): self
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return string
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param string $height
     */
    public function setHeight(int $height): self
    {
        $this->height = $height;
        return $this;
    }

}