<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/11/16
 * Time: 02:31 م
 */

namespace Formation\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Formation\AppBundle\Entity\Tag',
        ));
    }
}