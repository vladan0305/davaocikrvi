<?php

namespace AppBundle\Form\front;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;


class RequestType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                
                ->add('bloodType', TextType::class, ['label' => 'Krvna grupa','constraints' => new NotBlank(), 'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite krvnu grupu'
                ]])
                ->add('description', TextType::class, ['label' => 'Opis','constraints' => new NotBlank(), 'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Opis zahteva'
                ]])
                ->add('targetName', TextType::class, ['label' => 'Ime za koga je potrebna krv','constraints' => new NotBlank(), 'attr'  => [
                    'class'       => 'form-control',
                    'placeholder' => 'Unesite ime za koga je potrebna krv'
                ]])                
                ->add('submit', SubmitType::class, ['label' => 'Unesi',
                'attr'    => [ 'class' => 'btn btn-primary' ],
            ]);
    }
    
    /**
     * @param OptionsResolver $resolver
     * @value See docs
     */
    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => \AppBundle\Entity\AppRequest::class
        ]);
    }

    public function getName()
    {
        return 'request_type';
    }
}