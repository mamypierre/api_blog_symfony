<?php

namespace App\UserInterface\Request\Post;

use App\Domain\Contract\Request\Post\LastAddedRequestInterface;
use Symfony\Component\Validator\Constraints as Assert;
class LastAddedRequest implements LastAddedRequestInterface
{

    #[Assert\LessThan(value: 101)]
    private ?int $limit = null;

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