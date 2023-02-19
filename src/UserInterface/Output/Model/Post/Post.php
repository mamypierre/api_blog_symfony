<?php

namespace App\UserInterface\Output\Model\Post;

use App\UserInterface\Output\Contract\ImageInterface;
use App\UserInterface\Output\Contract\Post\PostInterface;
use App\UserInterface\Output\Contract\Post\PostPreviewInterface;
use ArrayObject;
use DateTimeImmutable;

class Post implements PostInterface
{
    protected string $title;
    protected ?string $shortDescription = null;

    protected DateTimeImmutable $updatedAt;
    protected DateTimeImmutable $createdAt;

    protected string|null $content = null;
    protected string|null $description = null;

    protected string $url;
    /**
     * @todo collection
     */
    protected array $images = [];

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return PostPreview
     */
    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    /**
     * @param string|null $shortDescription
     * @return PostPreview
     */
    public function setShortDescription(string $shortDescription = null): Post
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * @return  //ArrayObject< ImageInterface >
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array $images
     * @return PostPreview
     */
    public function addImage(ImageInterface $image): Post
    {
        $images = $this->images;
        if (!array_search($image, $images, true)) {
            $this->images[] = $image;
        }
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

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description = null): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content = null): self
    {
        $this->content = $content;
        return $this;
    }
}