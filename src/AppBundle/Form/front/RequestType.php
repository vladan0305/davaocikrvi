<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class RequestType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                
                ->add('bloodType', TextType::class, ['label' => 'Krvna grupa', 'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite krvnu grupu'
                ]])
                ->add('description', TextType::class, ['label' => 'Opis', 'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Opis zahteva'
                ]])
                ->add('targetName', TextType::class, ['label' => 'Ime za koga je potrebna krv', 'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite ime za koga je potrebna krv'
                ]])                
                ->add('submit', SubmitType::class, ['label' => 'Unesi',
                'attr'    => [ 'class' => 'btn btn-primary' ],
            ]);
    }
}