<?php

namespace App\UserInterface\Request\Post;

use App\Domain\Contract\Request\Post\LastAddedRequestInterface;

class LastAddedRequest implements LastAddedRequestInterface
{

    private int $limit;

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }
}