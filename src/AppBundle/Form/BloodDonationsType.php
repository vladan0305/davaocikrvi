<?php

namespace AppBundle\Form;

use AppBundle\Entity\AppBloodDonations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\AppUsers;
use AppBundle\Entity\AppRequest;
use AppBundle\Entity\AppCities;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BloodDonationsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('idUser', EntityType::class, ['label' => 'Korisnik',
        'class' => AppUsers::class,
        'choice_label' => 'email',
        'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite email korisnika'
        ]])
        ->add('idPlace', EntityType::class, ['label' => 'Grad',
        'class' => AppCities::class,
        'choice_label' => 'name',
        'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite grad'
        ]])
        ->add('idRequest', EntityType::class, ['label' => 'Grad',
        'class' => AppRequest::class,
        'choice_label' => 'id',
        'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite zahtev'
        ]])
        ->add('quantity', NumberType::class, ['label' => 'Kolicina', 'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite kolicinu'
        ]])        
        ->add('date', DateTimeType::class, ['label' => 'Datum'])
       
         ->add('status', TextType::class, ['label' => 'Status', 'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite status'
        ]])
       
        ->add('submit', SubmitType::class, ['label' => 'Unesi',
            'attr' => ['class' => 'btn btn-primary'],
        ]);
    }

    /**
     * @param OptionsResolver $resolver
     * @value See docs
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => AppBloodDonations::class
        ]);
    }

    public function getName() {
        return 'blooddonations_form';
    }

}
