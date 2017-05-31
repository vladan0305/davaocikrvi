<?php

namespace AppBundle\Form;

use AppBundle\Entity\AppRequestPlace;
use AppBundle\Entity\AppCities;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RequestPlaceType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
               ->add('city', EntityType::class, ['label' => 'Grad',
        'class' => AppCities::class,
        'choice_label' => 'name',
        'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite ime grada'
        ]])    
            ->add('address', TextType::class, [
                'label' => 'Adresa',
                'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite adresu'
                ]])
        ->add('type', NumberType::class, [
                'label' => 'Tip',
                'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite tip'
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
            'data_class' => AppRequestPlace::class
        ]);
    }

    public function getName()
    {
        return 'requestplace_form';
    }
}