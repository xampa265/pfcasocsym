<?php

namespace App\Controller;
use App\Entity\Asociados;
use App\Entity\User;
use App\Form\AsociadosType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Util\Debug;

class AsociadosController extends AbstractController
{


    #[Route('/asociados', name: 'asociados')]
    public function index(): Response
    {
        return $this->render('asociados/index.html.twig', [
            'controller_name' => 'AsociadosController',
        ]);
    }

    #[Route('/insertasociados', name: 'insertasociados')]
    public function insertAsociados(Request $request): Response
    {
         $asociado=new Asociados();
         $form=$this->createForm(AsociadosType::class,$asociado);
         $form->handleRequest($request);
          if($form->isSubmitted() && $form->isValid()){
                    $em=$this->getDoctrine()->getManager();
                    $em->persist($asociado);
                    $em->flush();
                    $this->addFlash('exito', 'Se ha registrado correctamente');
                   return $this->redirectToRoute('listasociados');
        }
        return $this->render('asociados/insert.html.twig', [
              'controller_name' => 'InsertAsociadosController',
              'formulario'=>$form->createView()
        ]);
    }

#[Route('/listasociados', name: 'listasociados')]
    public function listAsociados(): Response
    {
        $em=$this->getDoctrine()->getManager();
        $asociados=$em->getRepository(Asociados::class)->findAll();

        return $this->render('asociados/listAsociados.html.twig', [
             'errorMensaje'=>"",
            'resultados' => $asociados
        ]);
    }
    #[Route('/listasociados/delete/{id}', name: 'deleteasociadoid')]
    public function deleteAsociado ( int $id): Response {
        $em=$this->getDoctrine()->getManager();
         $asociado=$em->getRepository(Asociados::class)->find($id);
         $user=$em->getRepository(User::class)->findBy(
                                                        ['asociado' => $id]
                                                              );

                                           
         if (!$user){
                                    
              if (!$asociado) {
                 throw $this->createNotFoundException(
                         'No asociado found for id '.$id
                    );
                }
                 $em->remove($asociado);
                 $em->flush();
                 return $this->redirectToRoute('listasociados');

         }
         else{
              $asociados=$em->getRepository(Asociados::class)->findAll();
                 return $this->render('asociados/listAsociados.html.twig', [
                    'errorMensaje'=>"No se puede Borrar ese asociado porque tiene usuario",
                     'resultados' => $asociados
                  ]);
         }

            
        
    }


   #[Route('/listasociados/update/{id}', name: 'updateasociadoid')]
    public function updateAsociado ( Request $request,int $id): Response {
        $em=$this->getDoctrine()->getManager();
        $asociado=$em->getRepository(Asociados::class)->find($id);
        $form=$this->createForm(AsociadosType::class,$asociado);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
             $em=$this->getDoctrine()->getManager();
             $em->persist($asociado);
             $em->flush();

            $this->addFlash('exito', 'Se ha registrado correctamente');
            return $this->redirectToRoute('listasociados');
        }

       return $this->render('asociados/update.html.twig', [
              'formulario'=>$form->createView()
         ]);

    }


}
