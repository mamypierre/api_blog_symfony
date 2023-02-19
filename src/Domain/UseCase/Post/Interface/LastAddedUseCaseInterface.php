<?php

namespace App\Domain\UseCase\Post\Interface;

use App\Domain\Contract\Presenter\Post\LastAddedPresenterInterface;
use App\Domain\Contract\Request\Post\LastAddedRequestInterface;

interface LastAddedUseCaseInterface
{
    public function execute(LastAddedRequestInterface $request, LastAddedPresenterInterface $showPostPresenter);
}