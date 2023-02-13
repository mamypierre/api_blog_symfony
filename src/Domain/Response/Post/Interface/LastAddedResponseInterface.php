<?php
namespace App\Domain\Response\Post\Interface;
interface LastAddedResponseInterface
{
    public function getPostPreviews(): array;
}