<?php

namespace App\Domain\UseCase\Post\Interface;

use App\Domain\Contract\Presenter\Post\LastAddedPresenterInterface;
use App\Domain\Contract\Request\Post\LastAddedRequestInterface;

interface LastAddedInterface
{
    public function execute(LastAddedRequestInterface $request, LastAddedPresenterInterface $lastAddedPresenter);
}