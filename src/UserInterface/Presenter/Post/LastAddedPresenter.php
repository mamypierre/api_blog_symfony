<?php
namespace App\UserInterface\Presenter\Post;


use App\Domain\Contract\Presenter\Post\LastAddedPresenterInterface;
use App\Domain\Response\Post\Interface\LastAddedResponseInterface;
use App\UserInterface\Output\Model\Image;
use App\UserInterface\Output\Model\Post\PostPreview;
use App\UserInterface\ViewModel\Post\Interface\LastAddedViewModelInterface;
use App\UserInterface\ViewModel\Post\LastAddedViewModel;
use Symfony\Component\HttpFoundation\RequestStack;

class LastAddedPresenter implements LastAddedPresenterInterface
{

    protected LastAddedViewModelInterface $lastAddedViewModel;
    protected string $url;

    public function __construct(RequestStack $request = null)
    {
        $this->url = ($request) ? $request->getCurrentRequest()->getScheme().'://'.$request->getCurrentRequest()->getHost() : '';
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
                ->setTitle($postPreview->getTitle())
                ->setShortDescription($postPreview->getShortDescription())
                ->setCreatedAt($postPreview->getCreatedAt())
                ->setUpdatedAt($postPreview->getUpdatedAt())
            ;

            $images = $postPreview->getImages();
            $baseurl = $this->url;
            foreach ($images as $image) {
                $imageApi = new Image();
                $imageApi
                    ->setTitle($image->getTitle())
                    ->setWidth($image->getWidth())
                    ->setHeight($image->getHeight())
                    ->setType($image->getType())
                    ->setUri($baseurl.'/'.$image->getPath().$image->getName())
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