<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class InscrClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'Enter your mail'],
                'constraints' => [
                    new NotBlank(),
                    new Regex("/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/")
                ]
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['placeholder' => 'Enter your password'],
                'constraints' => [
                    new NotBlank(),
                    new Regex("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/")
                ],
                'help' => 'Minimum eight characters, at least one uppercase letter, one lowercase letter and one number',
                'always_empty' => true
            ])
            ->add('name', TextType::class, [
                'attr' => ['placeholder' => 'Enter your name'],
                'constraints' => [
                    new NotBlank(),
                    new Regex("/^[\w]+$/")
                ]
            ])
            ->add('surname', TextType::class, [
                'attr' => ['placeholder' => 'Enter your surname'],
                'constraints' => [
                    new NotBlank(),
                    new Regex("/^[\w]+$/")
                ]
            ])
            ->add('address', TextType::class, [
                'attr' => ['placeholder' => 'Enter your address (ex: 1 rue Montand)'],
                'constraints' => [
                    new NotBlank(),
                    new Regex("/^[\w]+$/")
                ]
            ])
            ->add('city', TextType::class, [
                'attr' => ['placeholder' => 'Enter your city'],
                'constraints' => [
                    new NotBlank(),
                    new Regex("/^[\w]+$/")
                ]
            ])
            ->add('cp', IntegerType::class, [
                'attr' => ['placeholder' => 'Enter your postal code'],
                'constraints' => [
                    new NotBlank(),
                    new Regex("/^[\d]+$/")
                ],
                'label' => 'Postal code'
            ])
            ->add('country', TextType::class, [
                'attr' => ['placeholder' => 'Enter your country'],
                'constraints' => [
                    new NotBlank(),
                    new Regex("/^[\w]+$/")
                ]
            ])
            ->add('birthday', BirthdayType::class, [
                'placeholder' => ['year' => 'Year', 'month' => 'Month', 'day' => 'Day',],
                'widget' => 'single_text',
                'label' => 'Birthday'
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
