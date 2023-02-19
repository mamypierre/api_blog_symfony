<?php

namespace App\Domain\Response\Post;

use App\Domain\Contract\Entity\Post\PostInterface;
use App\Domain\Response\Post\Interface\ShowPostResponseInterface;

class ShowPostResponse implements ShowPostResponseInterface
{

    private ?PostInterface $post= null;

    public function getPost(): ?PostInterface
    {
        return $this->post;
    }

    public function setPost(?PostInterface $post = null): self
    {
        $this->post = $post;
        return $this;
    }
}