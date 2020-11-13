<?php

namespace App\Form;

use App\Entity\PersonPlace;
use App\Entity\User;
use App\Entity\Place;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class PersonPlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('visitedAt', DateTimeType::class,
            [
                'years' => range(2020,2021),
                // 'format' => 'dd MMMM yyyy kk mm ss'
            ])
            ->add('person', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'firstname'
            ])
            ->add('place', EntityType::class, [
                'class' => Place::class,
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PersonPlace::class,
        ]);
    }
}


// function ('firstname','lastname') {
//     return 'firstname' . ' ' . 'lastname';
// },
