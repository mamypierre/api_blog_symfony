<?php

namespace App\UserInterface\ViewModel\Post;

use App\UserInterface\ViewModel\Post\Interface\LastAddedViewModelInterface;

class LastAddedViewModel implements LastAddedViewModelInterface
{
    /**
     * @todo protected
     */
    protected array $postPreviews;

    public function __construct(array $postPreviews)
    {
        $this->postPreviews = $postPreviews;
    }

    /**
     * @return array
     */
    public function getPostPreviews(): array
    {
        return $this->postPreviews;
    }
}