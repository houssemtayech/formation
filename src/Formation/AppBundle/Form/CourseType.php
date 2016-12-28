<?php

namespace Formation\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class CourseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')
            ->add('simpleDescription')
            ->add('description', 'textarea', array('attr' => array('rows' => '5')))
            ->add('price')
            ->add('learningObjectives', 'textarea', array('attr' => array('rows' => '5')))
            ->add('businessSkills', 'textarea', array('attr' => array('rows' => '5')))
            ->add('program', 'textarea', array('attr' => array('rows' => '5')))
            ->add('concernedPublic', 'textarea', array('attr' => array('rows' => '5')))
            ->add('prerequisites', 'textarea', array('attr' => array('rows' => '5')))
            ->add('duration')
            ->add('date')
            ->add('code')
            ->add('repa')
            ->add('forfaitIntra')
            ->add('idCategorie')
            ->add('brochure', FileType::class, array('data_class' => null))        ;
        $builder->add('tags', CollectionType::class, array(
            'entry_type' => TagType::class,
            'allow_add'    => true,
            'by_reference' => false,
            'allow_delete' => true,
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Formation\AppBundle\Entity\Course'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'formation_appbundle_course';
    }


}
