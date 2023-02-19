<?php

namespace App\Domain\Contract\Repository;

use App\Domain\Contract\Entity\Post\LastAddedInterface;
use App\Domain\Contract\Entity\Post\PostInterface;

interface PostRepositoryInterface
{
    const LIMIT = 5;
    /**
     * @return LastAddedInterface []
     */
    public function getLastAdded(?int $limit = null): array;
    public function findById(int $postId): ?PostInterface;
}