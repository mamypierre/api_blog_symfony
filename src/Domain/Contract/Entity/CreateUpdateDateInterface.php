<?php

namespace App\Domain\Contract\Entity;

use DateTimeImmutable;

interface CreateUpdateDateInterface
{
    public  function setUpdatedAt(DateTimeImmutable $updatedAt): self ;
    public  function setCreatedAt(DateTimeImmutable $createdAt): self ;
    public  function getCreatedAt(): ?DateTimeImmutable ;

    public function getUpdatedAt(): ?\DateTimeImmutable;
}