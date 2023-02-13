<?php

namespace App\UserInterface\Output\Model\Post;

use App\UserInterface\Output\Contract\ImageInterface;
use App\UserInterface\Output\Contract\Post\PostPreviewInterface;
use ArrayObject;

class PostPreview implements PostPreviewInterface
{
    protected string $title;
    protected ?string $shortDescription = null;
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

}