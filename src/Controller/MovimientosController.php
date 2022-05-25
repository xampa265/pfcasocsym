<?php

namespace App\Controller;


use App\Entity\Movimientos;
use App\Form\MovimientosType;
use App\Entity\Cuenta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Util\Debug;


class MovimientosController extends AbstractController
{
  #[Route('/insertmovimientos', name: 'insertmovimientos')]
    public function InsertarMovimientos(Request $request): Response
    {  
        $em=$this->getDoctrine()->getManager();
      

          $movimiento=new Movimientos();
         $form=$this->createForm(MovimientosType::class,$movimiento);
         $form->handleRequest($request);
          if($form->isSubmitted() && $form->isValid()){ 

           $importe=  $form['importe']->getData(); 
           $tipo=  $form['tipo']->getData(); 
           $saldo= $em->getRepository(Movimientos::class)->CalcularSaldo($importe,$tipo);
    

           $fecha =$form['fecha']->getData();
           $mes=intval(substr($fecha,5,2 ));
           
           $cuenta=$em->getRepository(Cuenta::class)->find(1);
      

           if($cuenta==null){
            
                     return $this->render('movimientos/index.html.twig', [
                            'errorMensaje'=>"Debes crear una cuenta  primero",
                             'controller_name' => 'InsertAsociadosController',
                             'formulario'=>$form->createView()
                        ]);
            
           }else{
                 $movimiento->setSaldo($saldo);
                 $movimiento->setMes($mes);
              
                if($tipo=="G"){
                         $importe=$importe*(-1);
                } 
                 $movimiento->setImporte($importe);
                $movimiento->setCuenta($cuenta);
                 $em->persist($movimiento);
                 $em->flush();

            $this->addFlash('exito', 'Se ha insertado correctamente');
            return $this->redirectToRoute('insertmovimientos');

           }


           
        }
        return $this->render('movimientos/index.html.twig', [
             'errorMensaje'=>"",
            'controller_name' => 'InsertAsociadosController',
           'formulario'=>$form->createView()
        ]);
    }

     #[Route('/meses', name: 'meses')]
    public function index(): Response
    {
        return $this->render('movimientos/meses.html.twig', [
            'controller_name' => 'MesesController',
        ]);
    }

#[Route('/meses/{id}', name: 'mesesid')]

    public function VerMes($id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $mes=$em->getRepository(Movimientos::class)->findBy(
                                                        ['mes' => $id],
                                                        ['fecha' => 'ASC']
                                                );
       
                $saldo=[];
                $importe=[];
                $fecha=[];                                
      
           foreach($mes as $dato){
                $saldo[]=$dato->getSaldo();
                $importe[]=$dato->getImporte();
                $fecha[]=$dato->getFecha();  
           }

        return $this->render('movimientos/VerMes.html.twig', [
            'mes' => $mes,
           'saldo'=>json_encode( $saldo),
           'importe'=>json_encode($importe),
            'fecha'=>json_encode( $fecha)
        ]);
    }


}
