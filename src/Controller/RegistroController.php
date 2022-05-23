<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\User;
use App\Entity\Asociados;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class RegistroController extends AbstractController
{
    #[Route('/registro', name: 'registro')]
   public function index(Request $request,  UserPasswordHasherInterface $passwordHasher): Response
    {
        $user=new user();
        $form=$this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

                    $em=$this->getDoctrine()->getManager();
                    $plaintextPassword = $form['password']->getData();
                    $asociado= $form['asociado']->getData();
                    $idAsociado=$asociado->getId();
                    $em=$this->getDoctrine()->getManager();
                    $idUser=$em->getRepository(User::class)->findBy(
                                                        ['asociado' => $idAsociado]
                                                              );

                    if(count($idUser) ==0)          {
                       $hashedPassword = $passwordHasher->hashPassword( $user, $plaintextPassword );
                        $user->setPassword($hashedPassword);
                         $user->setRoles(['ROLE_USER']);
                        $em->persist($user);
                         $em->flush();
                        $this->addFlash('exito', 'Se ha registrado exitosamente');
                        return $this->redirectToRoute('dashboard');
                 }  else{
                      return $this->render('registro/index.html.twig', [
                                  'errorMensaje'=>"Ese asociado ya tiene usuario elige otro",
                                  'controller_name' => "crear usuario nuevo",
                                 'formulario'=>$form->createView()
        ]);
                 }                                   
           

                  
        }
         return $this->render('registro/index.html.twig', [
                  'errorMensaje'=>"",
                 'controller_name' => "crear usuario nuevo",
                 'formulario'=>$form->createView()
        ]);
}
}
