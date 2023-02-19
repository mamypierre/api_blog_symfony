<?php
namespace App\Domain\Response\Post\Interface;

use App\Domain\Contract\Entity\Post\PostInterface;
interface ShowPostResponseInterface
{
    /**
     * @return PostInterface
     */
    public function getPost(): ?PostInterface;

    public function setPost(?PostInterface $post = null): self;
}