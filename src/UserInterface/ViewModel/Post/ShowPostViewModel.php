<?php

namespace App\UserInterface\ViewModel\Post;

use App\UserInterface\Output\Contract\Post\PostInterface;
use App\UserInterface\ViewModel\Post\Interface\ShowPostViewModelInterface;

class ShowPostViewModel implements ShowPostViewModelInterface
{
    protected ?PostInterface $post = null;

    public function __construct(?PostInterface $postPreviews = null)
    {
        $this->post = $postPreviews;
    }

    /**
     * @return array
     */
    public function getPost(): ?PostInterface
    {
        return $this->post;
    }
}