<?php

namespace App\Form;

use App\Entity\PersonCovid;
use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class PersonCovidType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('infectedAt', DateTimeType::class,
            [
                'years' => range(2020,2021),
                // 'format' => 'dd MMMM yyyy kk mm ss'
            ])
            ->add('asCovid', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'lastname'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PersonCovid::class,
        ]);
    }
}
