<?php

namespace App\Domain\Contract\Presenter\Post;

use App\Domain\Contract\ViewModel\ViewModelBaseInterface;
use App\Domain\Response\Post\Interface\ShowPostResponseInterface;

interface ShowPostPresenterInterface
{
    public function present(ShowPostResponseInterface $showPostResponse): void;

    public function getViewModel(): ViewModelBaseInterface;

}