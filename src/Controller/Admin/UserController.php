<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Enum\Role;


#[Route('/admin/utilisateurs', name: 'admin_user_')]
class UserController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {
    }

    #[Route('/', name: 'listing')]
    public function listingVisitor(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $users = $this->userRepository->findAllUser('["'.Role::USER.'"]');

        return $this->render('admin/user/listingVisitor.html.twig', [
            'users' => $users,
        ]);
    }
}
