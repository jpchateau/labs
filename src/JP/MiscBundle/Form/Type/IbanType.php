<?php

namespace JP\MiscBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Iban;
use JP\MiscBundle\Form\DataTransformer\IbanTransformer;

class IbanType extends AbstractType
{
    /**
    * {@inheritdoc}
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new IbanTransformer();
        $builder->addModelTransformer($transformer);

        $builder
            ->add(
                'c1',
                'text',
                array(
                    'label'      => ' ',
                    'attr'       => array('style' => 'width: 4em;'),
                    'max_length' => 4,
                )
            )
            ->add(
                'c2',
                'text',
                array(
                    'label'      => ' ',
                    'attr'       => array('style' => 'width: 4em;'),
                    'max_length' => 4,
                )
            )
            ->add(
                'c3',
                'text',
                array(
                    'label'      => ' ',
                    'attr'       => array('style' => 'width: 4em;'),
                    'max_length' => 4,
                )
            )
            ->add(
                'c4',
                'text',
                array(
                    'label'      => ' ',
                    'attr'       => array('style' => 'width: 4em;'),
                    'max_length' => 4,
                )
            )
            ->add(
                'c5',
                'text',
                array(
                    'label'      => ' ',
                    'attr'       => array('style' => 'width: 4em;'),
                    'max_length' => 4,
                )
            )
            ->add(
                'c6',
                'text',
                array(
                    'label'      => ' ',
                    'attr'       => array('style' => 'width: 4em;'),
                    'max_length' => 4,
                )
            )
            ->add(
                'c7',
                'text',
                array(
                    'label'      => ' ',
                    'attr'       => array('style' => 'width: 3.5em;'),
                    'max_length' => 3,
                )
            )
            ->add(
                'c8',
                'text',
                array(
                    'label'      => ' ',
                    'attr'       => array('style' => 'width: 6em; background:#DDD;'),
                    'max_length' => 7,
                )
            )
        ;
    }

    /**
    * {@inheritdoc}
    */
    public function getName()
    {
        return 'iban';
    }
}
