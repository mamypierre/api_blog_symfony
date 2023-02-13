<?php

namespace App\Domain\Contract\Presenter\Post;

use App\Domain\Contract\ViewModel\ViewModelBaseInterface;
use App\Domain\Response\Post\Interface\LastAddedResponseInterface;

interface LastAddedPresenterInterface
{
    public function present(LastAddedResponseInterface $addedResponse): void;

    public function getViewModel(): ViewModelBaseInterface;

}