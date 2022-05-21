<?php

namespace App\Form;

use App\Entity\Asociados;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AsociadosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('dni')
            ->add('telefono')
            ->add('poblacion')
            ->add('provincia')
            ->add('email')
            ->add('cuenta')
            ->add('profesion')
            ->add('anyo_nac')
            ->add('Enviar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Asociados::class,
        ]);
    }
}
