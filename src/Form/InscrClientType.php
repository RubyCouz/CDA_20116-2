<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscrClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, ['attr' => ['placeholder' => 'Enter your mail']])
            ->add('password', PasswordType::class, ['attr' => ['placeholder' => 'Enter your password']])
            ->add('name', TextType::class, ['attr' => ['placeholder' => 'Enter your name']])
            ->add('surname', TextType::class, ['attr' => ['placeholder' => 'Enter your surname']])
            ->add('address', TextType::class, ['attr' => ['placeholder' => 'Enter your address (ex: 1 rue Montand)']])
            ->add('city', TextType::class, ['attr' => ['placeholder' => 'Enter your city']])
            ->add('cp', IntegerType::class, ['attr' => ['placeholder' => 'Enter your postal code'], 'label' => 'Postal code'])
            ->add('country', TextType::class, ['attr' => ['placeholder' => 'Enter your country']])
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
