<?php

namespace Plugin\ShareThis\From\Type\Admin;

use Plugin\ShareThis\Entity\ShareThisConfig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShareThisConfigType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('propertyId',TextType::class,[
                'help'=>'Get on <a href="https://platform.sharethis.com/settings" target="_blank">Sharethis</a>',
                'help_html'=>true
            ])
            ->add('displayInline')
            ->add('inlineSelector',TextType::class,[
                'required'=>false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ShareThisConfig::class
        ]);
    }
}