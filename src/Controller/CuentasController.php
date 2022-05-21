<?php

namespace App\Controller;
use App\Entity\Cuenta;
use App\Form\CuentaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CuentasController extends AbstractController
{
    #[Route('/cuentas', name: 'cuentas')]
    public function index(): Response
    {
        return $this->render('cuentas/index.html.twig', [
            'controller_name' => 'CuentasController',
        ]);
    }


    #[Route('/insertcuentas', name: 'insertcuentas')]
    public function InserCuentas(Request $request): Response
    {

         $cuenta=new Cuenta();
         $form=$this->createForm(CuentaType::class,$cuenta);
         $form->handleRequest($request);
          if($form->isSubmitted() && $form->isValid()){
                    $em=$this->getDoctrine()->getManager();
                    $em->persist($cuenta);
                    $em->flush();
                    $this->addFlash('exito', 'Se ha registrado correctamente');
                    return $this->redirectToRoute('insertcuentas');
                }
        return $this->render('cuentas/insertCuentas.html.twig', [
            'controller_name' => 'InsertCuentasController',
            'formulario'=>$form->createView()
        ]);
    }
}
