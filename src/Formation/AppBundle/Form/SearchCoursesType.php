<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 02/12/16
 * Time: 11:41 م
 */

namespace Formation\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class SearchCoursesType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', array('attr' => array('placeholder' => 'Chercher une formation')));

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


    public function getName()
    {
        return 'formation_appbundle_scourse';
    }

}