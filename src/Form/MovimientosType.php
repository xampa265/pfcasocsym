<?php

namespace App\Form;

use App\Entity\Movimientos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class MovimientosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
         ->add('tipo',ChoiceType::class, array(
             'choices'  => array(
                     'Ingreso' =>"I",
                    'Gasto' => "G",
                  ),

))
           ->add('importe',MoneyType::class)
          
            ->add('numeroPedido')
            ->add('categoria',ChoiceType::class, array(
             'choices'  => array(
                     'Actos' =>"Actos",
                    'Secretaría' => "Secretaría",
                     'Presidencia' =>"Presidencia",
                    'Comunicación' => "Comunicación",
                    'Cuotas' => "Cuotas",
                     'Imprenta' =>"Imprenta",
                    'Desplazamiento' => "Desplazamiento",
                  )))

              ->add('fecha',DateType::class, array(
                     'input'  => 'string',
                     'widget' => 'choice',
                     'years'=>[2022]
                    ))   

            ->add('descripcion')
           
            ->add( 'Insertar',SubmitType::class)
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movimientos::class,
        ]);
    }
}
