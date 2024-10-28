<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class AnimalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Chien' => 'Chien',
                    'Chat' => 'Chat',
                    'Oiseau' => 'Oiseau',
                ],
            ])
            ->add('nom', TextType::class)
            ->add('age', IntegerType::class)
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Male' => 'Male',
                    'Femelle' => 'Femelle',
                ],
            ])
            ->add('race', TextType::class, ['required' => false])
            ->add('couleur', TextType::class, ['required' => false])
            ->add('espece', TextType::class, ['required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
