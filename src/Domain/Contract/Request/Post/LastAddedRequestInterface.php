<?php

namespace App\Domain\Contract\Request\Post;
interface LastAddedRequestInterface
{
    public function getLimit(): ?int;

    public function setLimit(?int $limit): self;
}