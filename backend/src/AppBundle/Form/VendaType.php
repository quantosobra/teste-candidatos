<?php

namespace App\AppBundle\Form;

use App\AppBundle\Entity\Venda;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use App\AppBundle\Entity\Cliente;
use App\AppBundle\Entity\Empresa;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VendaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataCompra', DateTimeType::class, [
                'widget' => 'single_text',
                'invalid_message' => 'Data inválida.',
            ])
            ->add('valor', MoneyType::class, array(
                'invalid_message' => 'Valor inválido.',
            ))
            ->add('comissao', MoneyType::class, array(
                'invalid_message' => 'Comissão inválida.',
            ))
            ->add('empresa', EntityType::class, array(
                'class' => Empresa::class,
                'choice_label' => 'id',
                'invalid_message' => 'Empresa não encontrada.',
            ))
            ->add('cliente', EntityType::class, array(
                'class' => Cliente::class,
                'choice_label' => 'id',
                'invalid_message' => 'Cliente não encontrado.',
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Venda::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'venda';
    }
}
