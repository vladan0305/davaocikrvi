<?php

namespace AppBundle\Form;

use AppBundle\Entity\AppCities;
use AppBundle\Entity\AppCountry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CitiesType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('country', EntityType::class, ['label' => 'Drzava',
                'class' => AppCountry::class,
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Unesite ime drzave'
            ]])    
            ->add('name', TextType::class, [
                'label' => 'Ime Države',
                'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite naziv za novu Državu'
                ]])
            ->add('postCode', NumberType::class, [
                'label' => 'Postanski kod',
                'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite postanski kod'
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
            'data_class' => AppCities::class
        ]);
    }

    public function getName()
    {
        return 'cities_form';
    }
}