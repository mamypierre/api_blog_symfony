<?php
namespace App\UserInterface\Presenter\Post;


use App\Domain\Contract\Presenter\Post\LastAddedPresenterInterface;
use App\Domain\Response\Post\Interface\LastAddedResponseInterface;
use App\UserInterface\Output\Model\Image;
use App\UserInterface\Output\Model\Post\PostPreview;
use App\UserInterface\ViewModel\Post\Interface\LastAddedViewModelInterface;
use App\UserInterface\ViewModel\Post\LastAddedViewModel;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class LastAddedPresenter implements LastAddedPresenterInterface
{

    protected LastAddedViewModelInterface $lastAddedViewModel;
    protected string $url;
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator, RequestStack $request = null)
    {
        $this->url = ($request) ? $request->getCurrentRequest()->getScheme().'://'.$request->getCurrentRequest()->getHost() : '';
        $this->urlGenerator = $urlGenerator;
    }

    public function present(LastAddedResponseInterface $addedResponse): void
    {
        $postPreviewApis = [];
        $baseurl = $this->url;
        // parse
        $postPreviews = $addedResponse->getPostPreviews();

        foreach ($postPreviews as $postPreview) {
            // init post
            $postUrl = $baseurl.'/'.$this->urlGenerator->generate('post_detail', ['id'=>$postPreview->getId()]);
            $postPreviewApi = new PostPreview();
            $postPreviewApi
                ->setTitle($postPreview->getTitle())
                ->setShortDescription($postPreview->getShortDescription())
                ->setCreatedAt($postPreview->getCreatedAt())
                ->setUpdatedAt($postPreview->getUpdatedAt())
                ->setUrl($postUrl)
            ;

            $images = $postPreview->getImages();
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