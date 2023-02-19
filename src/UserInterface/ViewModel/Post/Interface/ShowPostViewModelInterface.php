<?php

namespace App\UserInterface\ViewModel\Post\Interface;

use App\Domain\Contract\ViewModel\ViewModelBaseInterface;

interface ShowPostViewModelInterface extends ViewModelBaseInterface
{
    public function getPost();
}