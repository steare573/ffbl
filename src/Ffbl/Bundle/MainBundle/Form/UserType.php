<?php

namespace Ffbl\Bundle\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('salt')
            ->add('password')
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('active')
            ->add('dateAdded')
            ->add('dateTimeAdded')
            ->add('userRoles')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ffbl\Bundle\MainBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'ffbl_bundle_mainbundle_usertype';
    }
}
