<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Draw;
use App\Entity\Level;
use App\Entity\Surface;
use App\Entity\Tourney;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\Form\SubmitButtonTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TourneyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('createdAt')
            ->add('pathLogo')
            ->add('level',EntityType::class, [
	            'class' => Level::class,
	            'choice_label' => 'label',
            ])
	        ->add('Ajouter', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tourney::class,
        ]);
    }
}
