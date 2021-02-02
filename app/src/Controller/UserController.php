<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/user")
 */
class UserController
{
    private UserRepository $userRepository;
    private EntityManagerInterface $em;
    private SerializerInterface $serializer;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $this->userRepository = $userRepository;
        $this->serializer = $serializer;
        $this->em = $em;
    }

    /**
     * @Route("", methods={"GET"})
     *
     * @return JsonResponse
     */
    public function getAllUsers(): JsonResponse
    {
        $users = $this->userRepository->findAll();

        return new JsonResponse($users, 200);
    }

    /**
     * @Route("", methods={"POST"})
     */
    public function post(Request $request): JsonResponse
    {
        $data = null;

        try {
            $data = $this->serializer->deserialize($request->getContent(), User::class, 'json');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return new JsonResponse('Manque de temps', 500);
    }
}
