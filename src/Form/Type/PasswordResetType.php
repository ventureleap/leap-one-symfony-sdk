<?php

namespace VentureLeap\LeapOneSymfonySdk\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use VentureLeap\LeapOneSymfonySdk\Model\User\User;

class PasswordResetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plainPassword',
                RepeatedType::class,
                [
                    'first_options' => [
                        'label' => 'label.password',
                    ],
                    'second_options' => [
                        'label' => 'label.repeatPassword',
                    ],
                    'type' => PasswordType::class,
                    'invalid_message' => 'message.passwordsMustMatch',
                    'error_bubbling' => true,
                ]
            )
            ->add('submit', SubmitType::class, ['label' => 'label.submit'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ]);
    }
}
