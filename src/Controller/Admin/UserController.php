<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Enum\Role;
use App\Entity\User;
use App\Form\UserAdminFormType;
use Doctrine\ORM\EntityManagerInterface;


#[Route('/admin/utilisateurs', name: 'admin-user-')]
class UserController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $entityManager,
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

    #[Route('/nouveau', name: 'new')]
    public function newVisitor(Request $request) 
    {
        $user = new User;
        return $this->handlerAdminUser($user, $request);
    }

    #[Route('/{id}', name: 'detail')]
    public function editVisitor(User $user, Request $request) 
    {
        return $this->handlerAdminUser($user, $request);
    }

    private function handlerAdminUser(User $user, Request $request) 
    {
        $edit = $user->id ?? null;

        $form = $this->createForm(UserAdminFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            if (empty($edit)) {
                $this->addFlash('success', 'L\'utilisateur '.$user->getLastname().' '.$user->getFirstname().' a été créé');
            } else {
                $this->addFlash('success', 'L\'utilisateur '.$user->getLastname().' '.$user->getFirstname().' a été modifié');
            }

            return $this->redirectToRoute('admin-user-detail', ['id' => $edit]);
        }
    
        return $this->render('admin/user/detail.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }
}
