<?php

namespace App\Domain\Contract\Repository;

use App\Domain\Contract\Entity\Post\LastAdded;

interface PostRepositoryInterface
{
    const LIMIT = 5;
    /**
     * @return LastAdded []
     */
    public function getLastAdded(?int $limit = null): array;
}