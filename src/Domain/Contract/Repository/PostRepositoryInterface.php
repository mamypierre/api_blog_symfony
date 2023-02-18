<?php

namespace App\Domain\Contract\Repository;

use App\Domain\Contract\Entity\Post\LastAdded;

interface PostRepositoryInterface
{
    /**
     * @return LastAdded []
     */
    public function getLastAdded(): array;
}