<?php

namespace App\UserInterface\Output\Model\Post;

use App\UserInterface\Output\Contract\ImageInterface;
use App\UserInterface\Output\Contract\Post\PostPreviewInterface;
use ArrayObject;
use DateTimeImmutable;

class PostPreview implements PostPreviewInterface
{
    protected string $title;
    protected ?string $shortDescription = null;

    protected DateTimeImmutable $updatedAt;
    protected DateTimeImmutable $createdAt;
    /**
     * @todo collection
     */
    protected array $images = [];

    public function __construct()
    {
        /**
         * @todo collection
         */
//        $this->images = new ArrayObject();
    }

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
    public function setTitle(string $title): PostPreview
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
    public function setShortDescription(string $shortDescription = null): PostPreview
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
    public function addImage(ImageInterface $image): PostPreview
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

}