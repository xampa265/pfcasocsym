<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{

     
     //@Route("/logout", name="app_logout", methods={"GET"})
     
    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
         $this->redirectToRoute('app_login');
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }



    // #[Route('/security', name: 'app_security')]
    // public function index(): Response
    // {
    //     return $this->render('security/index.html.twig', [
    //         'controller_name' => 'SecurityController',
    //     ]);
   // }
}
