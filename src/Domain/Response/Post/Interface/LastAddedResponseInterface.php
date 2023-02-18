<?php
namespace App\Domain\Response\Post\Interface;

use App\Domain\Contract\Entity\Post\LastAdded;
interface LastAddedResponseInterface
{
    /**
     * @return LastAdded []
     */
    public function getPostPreviews(): array;
}