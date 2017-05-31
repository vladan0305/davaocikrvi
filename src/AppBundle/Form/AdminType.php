<?php

namespace AppBundle\Form;

use AppBundle\Entity\AppAdmin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', TextType::class, [
                'label' => 'Ime',
                'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite vase ime'
                ]])
             ->add('last_name', TextType::class, [
                'label' => 'Prezime',
                'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite vase prezime'
                ]])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite vasu email adresu'
                ]])
            ->add('password', PasswordType::class, [
                'label' => 'Sifra',
                'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite sifru'
                ]])    
            ->add('save', SubmitType::class, [
                'label'   => 'Kreiraj',
                'attr'    => [ 'class' => 'btn btn-primary' ],
            ])
        ;
    }

  /**
     * @param OptionsResolver $resolver
     * @value See docs
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AppAdmin::class
        ]);
    }

    public function getName()
    {
        return 'admin_form';
    }
}