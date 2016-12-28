<?php

namespace Formation\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InscriptionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titleFormation','text',array('read_only' => true))
            ->add('codeFormation','text',array('read_only' => true))
            ->add('price','text',array('read_only' => true))
            ->add('date','date',array('read_only' => true))
            ->add('codePromo')
            ->add('comment', 'textarea', array('attr' => array('rows' => '3')))
            ->add('inscriptionSource', ChoiceType::class, array(
                'choices'  => array(
                    '' => null,
                    'au catalogue' => 'au catalogue',
                    'à une plaquette' => 'à une plaquette',
                    'à un emailing' => 'à un emailing',
                    'à un fax' => 'à un fax',
                    'à une visite sur notre site' => 'à une visite sur notre site',
                    'à une newsletter' => 'à une newsletter',
                    'à une bannière publicitaire' => 'à une bannière publicitaire',
                    'à une recherche sur internet' => 'à une recherche sur internet',
                    'autre' => 'autre',
                ),
            ))
            ->add('civility', ChoiceType::class, array(
                'choices'  => array(

                    'Monsieur' => 'Monsieur',
                    'Madame' => 'Madame',
                ),
            ))
            ->add('firstName')
            ->add('lastName')
            ->add('fonction')
            ->add('email')
            ->add('phone')
            ->add('responsibleFirstName')
            ->add('responsibleLastName')
            ->add('responsibleEmail')
            ->add('iResponsibleCivility', ChoiceType::class, array(
                'choices'  => array(

                    'Monsieur' => 'Monsieur',
                    'Madame' => 'Madame',
                ),
            ))
            ->add('iResponsibleFirstName')
            ->add('iResponsibleLastName')->add('iResponsibleFonction')->add('iResposiblePhone')->add('iResponsibleEmail')
            ->add('company')->add('companyService')->add('companyAddress', 'textarea', array('attr' => array('rows' => '3')))
            ->add('companyPostalCode')->add('companySupplimentTrack')->add('companyPostBox')
            ->add('city')->add('country')->add('codeA')->add('numberSiret')
            ->add('purchaseOrder', 'choice', array(
                'choices'   => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ),
                'expanded' => true,
                'multiple' => false
            ))
            ->add('ifYesNumber')
            ->add('billingAddress', 'textarea', array('attr' => array('rows' => '3')))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Formation\AppBundle\Entity\Inscription'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'formation_appbundle_inscription';
    }


}
