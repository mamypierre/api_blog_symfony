<?php

namespace App\Infrastructure\Doctrine\DataFixtures;

use App\Infrastructure\Doctrine\Entity\Image;
use App\Infrastructure\Doctrine\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $image = new Image();
        $image
            ->setTitle('Image test')
            ->setType(Image::TYPE_THUMBNAIL)
            ->setHeight(167)
            ->setWidth(250)
            ->setName('test.jpg')
            ->setPath('image/');
        $manager->persist($image);
        // create 20 products! Bam!
        for ($i = 0; $i < 2; $i++) {
            $post = new Post();
            $post
                ->setTitle('product ' . $i)
                ->setShortDescription('Short description ' . $i)
                ->addImage($image)
            ;
            $manager->persist($post);
        }

        $manager->flush();
    }
}