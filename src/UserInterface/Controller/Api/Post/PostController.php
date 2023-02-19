<?php

namespace App\UserInterface\Controller\Api\Post;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PostController extends AbstractController
{
    public function __invoke(
        int $id,
        Request $request
    ): JsonResponse
    {
        dd('dona');
        return $this->json(['fsd']);
    }
}