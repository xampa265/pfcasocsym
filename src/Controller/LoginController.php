<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Asociados;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Util\Debug;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginController extends AbstractController
{
    #[Route('/', name: 'login')]
   public function index(AuthenticationUtils $authenticationUtils, UserPasswordHasherInterface $passwordHasher): Response
    {
        // get the login error if there is one
         $error = $authenticationUtils->getLastAuthenticationError();
        // cuando carga la pagina he de comprobar que la bbdd tiene usuario
         $em=$this->getDoctrine()->getManager();
         $user=$em->getRepository(User::class)->findAll();
           if(count($user) ==0) {

                     //no esta admin debo crear asociado y user 
                       //me voy a repo
                     $asociado= $em->getRepository(Asociados::class)->crearAdmin();
                     $user=new User();
                     $user-> setUsername("Admin");
                     $user->setRoles(['ROLE_USER']);
                     $hashedPassword = $passwordHasher->hashPassword( $user, "Admin" );
                     $user-> setPassword($hashedPassword);
                     $user-> setAsociado($asociado);
                     $em->persist($user);
                     $em->flush();
      
                  
                      return $this->redirectToRoute('login');
         
  }  else{
      //si exite admin y puedo entrar
       // last username entered by the user
         $lastUsername = $authenticationUtils->getLastUsername();
         return $this->render('login/index.html.twig', [
                  'last_username' => $lastUsername,
                 'error'     => $error,
             ]);
    }
  }   



}
