<?php

namespace Formation\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('attr' => array('placeholder' => 'Votre Nom')))
            ->add('email', 'text', array('attr' => array('placeholder' => 'Email')))
            ->add('subject', 'text', array('attr' => array('placeholder' => 'Société ')))
            ->add('message', 'textarea', array('attr' => array('placeholder' => 'Votre Message')))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Formation\AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'formation_appbundle_contact';
    }


}
