<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Asociados;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
           //->add('roles')
            ->add('password', PasswordType::class)
           // ->add('asociado','Registrar',SubmitType::class)
           ->add('asociado', EntityType::class, [
                // looks for choices from this entity
                 'class' => Asociados::class,
                 'choice_label' => 'Apellidos',
            ])
           ->add( 'Registrar',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
