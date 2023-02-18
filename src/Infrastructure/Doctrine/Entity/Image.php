<?php

namespace App\Infrastructure\Doctrine\Entity;

use App\Domain\Contract\Entity\Image\ImageInterface;

class Image implements ImageInterface
{
    protected string $title ;

    protected string $type ;
    protected string $dimension ;

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
    public function setTitle(string $title): Image
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
    public function setType(string $type): Image
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getDimension(): string
    {
        return $this->dimension;
    }

    /**
     * @param string $dimension
     * @return Image
     */
    public function setDimension(string $dimension): Image
    {
        $this->dimension = $dimension;
        return $this;
    }
}