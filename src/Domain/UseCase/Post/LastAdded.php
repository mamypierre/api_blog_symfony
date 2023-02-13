<?php

namespace App\Domain\UseCase\Post;
use App\Domain\Contract\Presenter\Post\LastAddedPresenterInterface;
use App\Domain\Contract\Request\Post\LastAddedRequestInterface;
use App\Domain\Response\Post\LastAddedResponse;
use App\Domain\UseCase\Post\Interface\LastAddedInterface;
use JetBrains\PhpStorm\NoReturn;
use stdClass;

class LastAdded implements LastAddedInterface
{
    #[NoReturn] public function execute(LastAddedRequestInterface $request, LastAddedPresenterInterface $lastAddedPresenter) : void
    {
        // get response
        // image
        $image = new stdClass();
        $image->title = 'tilte image';
        $image->type = 'type';
        $image->dimension = 'dimension';
        //post
        $postPreview = new stdClass();
        $postPreview->title = "tilte post";
        $postPreview->shortDescription = "shortDescription post";
        $postPreview->images = [$image];

        // build response
        $response = new LastAddedResponse();
        $response->setPostPreviews([$postPreview]);

        // set in presenter
        $lastAddedPresenter->present($response);
    }
}