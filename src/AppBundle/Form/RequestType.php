<?php

namespace AppBundle\Form;

use AppBundle\Entity\AppRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RequestType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('dateTime', DateTimeType::class, ['label' => 'Datum'])
                ->add('bloodType', TextType::class, ['label' => 'Krvna grupa', 'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite naziv za novu Državu'
                ]])
                ->add('description', TextType::class, ['label' => 'Opis', 'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite naziv za novu Državu'
                ]])
                ->add('targetName', TextType::class, ['label' => 'Ime za koga je potrebna krv', 'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite naziv za novu Državu'
                ]])                
                ->add('submit', SubmitType::class, ['label' => 'Unesi',
                'attr'    => [ 'class' => 'btn btn-primary' ],
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     * @value See docs
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AppRequest::class
        ]);
    }

    public function getName()
    {
        return 'request_form';
    }
}