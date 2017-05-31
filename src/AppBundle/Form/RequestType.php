<?php

namespace AppBundle\Form;

use AppBundle\Entity\AppRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\AppUsers;
use AppBundle\Entity\AppAdmin;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RequestType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('idUser', EntityType::class, ['label' => 'Korisnik',
        'class' => AppUsers::class,
        'choice_label' => 'email',
        'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite email korisnika'
        ]])
        ->add('changedBy', EntityType::class, ['label' => 'Administrator',
        'class' => AppAdmin::class,
        'choice_label' => 'email',
        'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite email administratora'
        ]])
        ->add('dateTime', DateTimeType::class, ['label' => 'Datum'])
        ->add('bloodType', TextType::class, ['label' => 'Krvna grupa', 'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite naziv za novu Državu'
        ]])
        ->add('description', TextType::class, ['label' => 'Opis', 'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite opis'
        ]])
        ->add('targetName', TextType::class, ['label' => 'Ime za koga je potrebna krv', 'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite ime za koga je krv'
        ]])
        ->add('timeActive', DateTimeType::class, ['label' => 'Do kada vazi'])
         ->add('status', TextType::class, ['label' => 'Status', 'attr' => [
        'class' => 'form-control',
        'placeholder' => 'Unesite status'
        ]])
        ->add('changedStatusTime', DateTimeType::class, ['label' => 'Vreme promene statusa'])
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
            'data_class' => AppRequest::class
        ]);
    }

    public function getName() {
        return 'request_form';
    }

}
