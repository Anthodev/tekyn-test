<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/user")
 */
class UserController
{
    private UserRepository $userRepository;
    private EntityManagerInterface $em;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $em)
    {
        $this->userRepository = $userRepository;
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
}
