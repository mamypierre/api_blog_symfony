<?php

namespace App\Domain\UseCase\Post;
use App\Domain\Contract\Presenter\Post\LastAddedPresenterInterface;
use App\Domain\Contract\Repository\PostRepositoryInterface;
use App\Domain\Contract\Request\Post\LastAddedRequestInterface;
use App\Domain\Response\Post\LastAddedResponse;
use App\Domain\UseCase\Post\Interface\LastAddedInterface;


class LastAdded implements LastAddedInterface
{

    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param LastAddedRequestInterface $request
     * @param LastAddedPresenterInterface $lastAddedPresenter
     * @return void
     */
    public function execute(LastAddedRequestInterface $request, LastAddedPresenterInterface $lastAddedPresenter) : void
    {
        $postLastAdded = $this->postRepository->getLastAdded();
        // build response
        $response = new LastAddedResponse();
        $response->setPostPreviews($postLastAdded);

        // set in presenter
        $lastAddedPresenter->present($response);
    }
}