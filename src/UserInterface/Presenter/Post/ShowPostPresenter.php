<?php

namespace App\UserInterface\Presenter\Post;


use App\Domain\Contract\Presenter\Post\ShowPostPresenterInterface;
use App\Domain\Response\Post\Interface\ShowPostResponseInterface;
use App\UserInterface\Output\Model\Image;
use App\UserInterface\Output\Model\Post\Post;
use App\UserInterface\ViewModel\Post\Interface\ShowPostViewModelInterface;
use App\UserInterface\ViewModel\Post\ShowPostViewModel;
use Symfony\Component\HttpFoundation\RequestStack;

class ShowPostPresenter implements ShowPostPresenterInterface
{

    protected ShowPostViewModelInterface $showPostViewModel;
    protected string $url;

    public function __construct( RequestStack $request = null)
    {
        $this->url = ($request) ? $request->getCurrentRequest()->getScheme() . '://' . $request->getCurrentRequest()->getHost() : '';
    }

    public function present(ShowPostResponseInterface $showPostResponse): void
    {
        $baseurl = $this->url;
        $postApi = null;
        // parse
        $post = $showPostResponse->getPost();
        if ($post) {
            $postApi = new Post();
            // init post
            $postApi
                ->setTitle($post->getTitle())
                ->setShortDescription($post->getShortDescription())
                ->setCreatedAt($post->getCreatedAt())
                ->setUpdatedAt($post->getUpdatedAt())
            ;

            $images = $post->getImages();
            foreach ($images as $image) {
                $imageApi = new Image();
                $imageApi
                    ->setTitle($image->getTitle())
                    ->setWidth($image->getWidth())
                    ->setHeight($image->getHeight())
                    ->setType($image->getType())
                    ->setUri($baseurl . '/' . $image->getPath() . $image->getName());
                $postApi->addImage($imageApi);
            }
        }

        $this->showPostViewModel = new ShowPostViewModel($postApi);
    }

    public function getViewModel(): ShowPostViewModelInterface
    {
        return $this->showPostViewModel;
    }
}