<?php

namespace App\UserInterface\Controller\Api\Post;

use App\Domain\Contract\Presenter\Post\ShowPostPresenterInterface;
use App\Domain\UseCase\Post\Interface\ShowPostUseCaseInterface;
use App\UserInterface\Request\Post\ShowPostRequest;
use App\UserInterface\ViewModel\Post\Interface\ShowPostViewModelInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PostController extends AbstractController
{
    public function __invoke(
        int                        $id,
        Request                    $request,
        ShowPostUseCaseInterface   $showPostUseCase,
        ShowPostPresenterInterface $showPostPresenter
    ): JsonResponse
    {
        $showPostRequest = new ShowPostRequest();
        $showPostRequest->setPostId($id);
        $showPostUseCase->execute($showPostRequest, $showPostPresenter);
        // built response api
        /** @var ShowPostViewModelInterface $viewModel */
        $viewModel = $showPostPresenter->getViewModel();
        return $this->json($viewModel);
    }
}