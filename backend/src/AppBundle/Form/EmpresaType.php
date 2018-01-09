<?php

namespace App\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmpresaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('telefone')
            ->add('email')
            ->add('endereco')
            ->add('descricao')
            ->add('imagem');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => App\AppBundle\Entity\Empresa::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'empresa';
    }
}
