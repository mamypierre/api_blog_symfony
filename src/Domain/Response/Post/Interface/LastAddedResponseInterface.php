<?php
namespace App\Domain\Response\Post\Interface;

use App\Domain\Contract\Entity\Post\LastAddedInterface;
interface LastAddedResponseInterface
{
    /**
     * @return LastAddedInterface []
     */
    public function getPostPreviews(): array;

    public function setPostPreviews(array $postPreviews): self;
}