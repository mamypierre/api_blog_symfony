<?php

namespace App\UserInterface\Controller\Post;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LastAddedController extends AbstractController
{
        public function __invoke(Request $request): JsonResponse
        {
           return $this->json(['last post']);
        }
}