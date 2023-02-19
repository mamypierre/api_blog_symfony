<?php

namespace App\Domain\UseCase\Post;

use App\Domain\Contract\Presenter\Post\LastAddedPresenterInterface;
use App\Domain\Contract\Repository\PostRepositoryInterface;
use App\Domain\Contract\Request\Post\LastAddedRequestInterface;
use App\Domain\Response\Post\LastAddedResponse;
use App\Domain\UseCase\Post\Interface\LastAddedUseCaseInterface;


class LastAddedUseCase implements LastAddedUseCaseInterface
{

    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param LastAddedRequestInterface $request
     * @param LastAddedPresenterInterface $showPostPresenter
     * @return void
     */
    public function execute(LastAddedRequestInterface $request, LastAddedPresenterInterface $showPostPresenter): void
    {
        $postLastAdded = $this->postRepository->getLastAdded($request->getLimit());

        // build response
        $response = new LastAddedResponse();
        $response->setPostPreviews($postLastAdded);

        // set in presenter
        $showPostPresenter->present($response);
    }
}