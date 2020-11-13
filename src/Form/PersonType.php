<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Place;
// use Proxies\__CG__\App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('birthday', DateType::class,
                [
                    'years' => range(1950,2020),
                    'format' => 'dd MMMM yyyy'
                ])
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'Other' => ' ',
                    'Man' => 'Monsieur',
                    'Women' => 'Madame',
                ],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
