<?php

namespace App\Infrastuture\Doctrine\Repository;

use App\Domain\Contract\Repository\PostRepositoryInterface;
use App\Infrastuture\Doctrine\Entity\Image;
use App\Infrastuture\Doctrine\Entity\Post;

class PostRepositoryRepository implements PostRepositoryInterface
{

    /**
     * @return array|PostRepositoryInterface[]
     *@todo buid with doctrine
     */
    public function getLastAdded(): array
    {
        // @todo get this by data base
        $image = new Image();
        $image->setTitle('tilte image') ;
        $image->setType('type') ;
        $image->setDimension('dimension') ;
        //post
        $postPreview = new Post();
        $postPreview->setTitle('tilte post');
        $postPreview->setShortDescription("shortDescription post");
        $postPreview->addImage($image);

        return [$postPreview];
    }
}