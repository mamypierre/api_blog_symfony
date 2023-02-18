<?php

namespace App\UserInterface\ViewModel\Post\Interface;

use App\Domain\Contract\ViewModel\ViewModelBaseInterface;

interface LastAddedViewModelInterface extends ViewModelBaseInterface
{
    public function getPostPreviews();
}