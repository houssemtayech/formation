<?php

namespace Formation\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class DevisType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('civility', ChoiceType::class, array(
            'choices'  => array(

                'Monsieur' => 'Monsieur',
                'Madame' => 'Madame',
            ),
        ))
            ->add('firstName','text', array('attr' => array('placeholder' => ' Nom* ')))
            ->add('lastName','text', array('attr' => array('placeholder' => 'Prénom* ')))
            ->add('function','text', array('attr' => array('placeholder' => 'Fonction')))
            ->add('company','text', array('attr' => array('placeholder' => 'Société*')))
            ->add('phone','text', array('attr' => array('placeholder' => 'Téléphone* ')))
            ->add('email','text', array('attr' => array('placeholder' => 'E-mail* ')))
            ->add('object', ChoiceType::class, array(
                'choices'   => array(
                    
                    'inter' => 'Formation inter-entreprises sur catalogue (dans les locaux de Cegix)',
                    'intra' => 'Formation intra sur mesure (Forfait groupe dans vos locaux)',
                    'autre' => 'Autre'
                ),

            ))
            ->add('message','text', array('attr' => array('placeholder' => 'Message')))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Formation\AppBundle\Entity\Devis'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'formation_appbundle_devis';
    }


}
