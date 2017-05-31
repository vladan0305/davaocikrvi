<?php

namespace AppBundle\Form;

use AppBundle\Entity\AppCountry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CountryType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Ime Države',
                'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite naziv za novu Državu'
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
            'data_class' => AppCountry::class
        ]);
    }

    public function getName()
    {
        return 'country_form';
    }
}