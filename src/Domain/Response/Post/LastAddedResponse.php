<?php
namespace App\Domain\Response\Post;
use App\Domain\Response\Post\Interface\LastAddedResponseInterface;

class LastAddedResponse implements LastAddedResponseInterface
{
    public array $postPreviews;

    /**
     * @return array
     */
    public function getPostPreviews(): array
    {
        return $this->postPreviews;
    }

    /**
     * @param array $postPreviews
     */
    public function setPostPreviews(array $postPreviews): void
    {
        $this->postPreviews = $postPreviews;
    }
}