<?php

namespace App\Infrastructure\Doctrine\Entity\Trai;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

trait Timestamp
{

    public abstract function setUpdatedAt(DateTimeImmutable $updatedAt): self ;
    public abstract function setCreatedAt(DateTimeImmutable $createdAt): self ;
    public abstract function getCreatedAt(): ?DateTimeImmutable ;

    #[ORM\PrePersist()]
    #[ORM\PreUpdate()]
    public function updatedTimestamps(): void
    {
        $dateTimeNow = new DateTimeImmutable('now');

        $this->setUpdatedAt($dateTimeNow);

        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($dateTimeNow);
        }
    }
}