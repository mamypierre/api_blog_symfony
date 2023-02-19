<?php

namespace App\UserInterface\Request\Post;

use App\Domain\Contract\Request\Post\ShowPostRequestInterface;

class ShowPostRequest implements ShowPostRequestInterface
{

    private int $postId;

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     */
    public function setPostId(int $postId): self
    {
        $this->postId = $postId;
        return $this;
    }


}