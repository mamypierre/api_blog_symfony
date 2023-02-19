<?php

namespace App\Domain\Contract\Request\Post;
interface ShowPostRequestInterface
{
    public function getPostId(): ?int;

    public function setPostId(int $postId): self;
}