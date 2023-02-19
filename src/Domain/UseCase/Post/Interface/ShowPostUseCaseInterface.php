<?php

namespace App\Domain\UseCase\Post\Interface;

use App\Domain\Contract\Presenter\Post\ShowPostPresenterInterface;
use App\Domain\Contract\Request\Post\ShowPostRequestInterface;

interface ShowPostUseCaseInterface
{
    public function execute(ShowPostRequestInterface $request, ShowPostPresenterInterface $showPostPresenter);
}