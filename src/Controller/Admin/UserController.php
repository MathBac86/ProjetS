<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Enum\Role;
use App\Entity\User;
use App\Form\Admin\UserAdminFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\UX\Turbo\TurboBundle;


#[Route('/admin/utilisateurs', name: 'admin-user-')]
class UserController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    #[Route('/', name: 'listing')]
    #[IsGranted('ROLE_ADMIN', statusCode: 404, message: 'Post not found')]
    public function listingVisitor(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $users = $this->userRepository->findAllUser('["'.Role::USER.'"]');

        return $this->render('admin/user/listingVisitor.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/nouveau', name: 'new')]
    #[IsGranted('ROLE_ADMIN', statusCode: 404, message: 'Post not found')]
    public function newVisitor(Request $request) 
    {
        $user = new User;
        return $this->handlerAdminUser($user, $request);
    }

    #[Route('/{id}', name: 'detail')]
    #[IsGranted('ROLE_ADMIN', statusCode: 404, message: 'Post not found')]
    public function editVisitor(User $user, Request $request) 
    {
        return $this->handlerAdminUser($user, $request);
    }

    private function handlerAdminUser(User $user, Request $request) 
    {
        $edit = $user->getId() ?? null;

        $form = $this->createForm(UserAdminFormType::class, $user);
        //$emptyForm = clone $form;
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dd($user);
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            // 🔥 The magic happens here! 🔥
            if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                //return $this->renderBlock('admin/user/detail.html.twig', 'success_stream', ['user' => $user, 'form' => $emptyForm]);
            }

            if (empty($edit)) {
                $this->addFlash('success', 'L\'utilisateur '.$user->getLastname().' '.$user->getFirstname().' a été créé');
            } else {
                $this->addFlash('success', 'L\'utilisateur '.$user->getLastname().' '.$user->getFirstname().' a été modifié');
            }

            return $this->redirectToRoute('admin-user-detail', ['id' => $edit]);
        }
    
        return $this->render('admin/user/detail.html.twig', [
            'user' => $user,
            'form' => $form
        ]);
    }
}
