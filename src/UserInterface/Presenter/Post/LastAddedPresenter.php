<?php
namespace App\UserInterface\Presenter\Post;


use App\Domain\Contract\Presenter\Post\LastAddedPresenterInterface;
use App\Domain\Response\Post\Interface\LastAddedResponseInterface;
use App\UserInterface\Output\Model\Image;
use App\UserInterface\Output\Model\Post\PostPreview;
use App\UserInterface\ViewModel\Post\Interface\LastAddedViewModelInterface;
use App\UserInterface\ViewModel\Post\LastAddedViewModel;

class LastAddedPresenter implements LastAddedPresenterInterface
{

    protected LastAddedViewModelInterface $lastAddedViewModel;

    public function __construct()
    {
    }

    public function present(LastAddedResponseInterface $addedResponse): void
    {
        $postPreviewApis = [];
        // parse
        $postPreviews = $addedResponse->getPostPreviews();

        foreach ($postPreviews as $postPreview) {
            // init post
            $postPreviewApi = new PostPreview();
            $postPreviewApi
                ->setTitle($postPreview->title)
                ->setShortDescription($postPreview->shortDescription)
            ;

            $images = $postPreview->images;

            foreach ($images as $image) {
                $imageApi = new Image();
                $imageApi
                    ->setTitle($image->title)
                    ->setDimension($image->dimension)
                    ->setType($image->type)
                ;
                $postPreviewApi->addImage($imageApi);
            }

            // add $postPreviewsApi
            $postPreviewApis[] = $postPreviewApi;
        }
        $this->lastAddedViewModel = new LastAddedViewModel($postPreviewApis);
    }

    public function getViewModel(): LastAddedViewModelInterface
    {
        return $this->lastAddedViewModel;
    }
}