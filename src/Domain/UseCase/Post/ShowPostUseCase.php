<?php

namespace App\Domain\UseCase\Post;


use App\Domain\Contract\Presenter\Post\ShowPostPresenterInterface;
use App\Domain\Contract\Repository\PostRepositoryInterface;
use App\Domain\Contract\Request\Post\ShowPostRequestInterface;
use App\Domain\Response\Post\ShowPostResponse;
use App\Domain\UseCase\Post\Interface\ShowPostUseCaseInterface;


class ShowPostUseCase implements ShowPostUseCaseInterface
{

    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    public function execute(ShowPostRequestInterface $request, ShowPostPresenterInterface $showPostPresenter): void
    {
        $post = $this->postRepository->findById($request->getPostId());
        // build response
        $response = new ShowPostResponse();
        $response->setPost($post);

        // set in presenter
        $showPostPresenter->present($response);
    }
}