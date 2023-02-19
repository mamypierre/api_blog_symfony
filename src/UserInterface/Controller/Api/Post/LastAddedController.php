<?php

namespace App\UserInterface\Controller\Api\Post;

use App\Domain\Contract\Presenter\Post\LastAddedPresenterInterface;
use App\Domain\UseCase\Post\Interface\LastAddedUseCaseInterface;
use App\UserInterface\Request\Post\LastAddedRequest;
use App\UserInterface\ViewModel\Post\Interface\LastAddedViewModelInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class LastAddedController extends AbstractController
{
    public function __invoke(
        Request                     $request,
        LastAddedUseCaseInterface   $lastAddedUseCase,
        LastAddedPresenterInterface $lastAddedPresenter,
        SerializerInterface         $serializer,
        ValidatorInterface $validator
    ): JsonResponse
    {
        $lastAddedRequest = new LastAddedRequest();
        if ($request->getContent()){
            $lastAddedRequest = $serializer->deserialize($request->getContent(), LastAddedRequest::class, 'json');
        }
        // check error
        $errors = $validator->validate($lastAddedRequest);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return $this->json($errorsString);
        }
        $lastAddedUseCase->execute($lastAddedRequest, $lastAddedPresenter);
        // built response api
        /** @var LastAddedViewModelInterface $viewModel */
        $viewModel = $lastAddedPresenter->getViewModel();
        return $this->json($viewModel);
    }
}