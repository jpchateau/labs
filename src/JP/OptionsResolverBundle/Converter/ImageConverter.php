<?php

namespace JP\OptionsResolverBundle\Converter;

use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageConverter
{
    /**
     * @var array
     */
    private $options;

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param string $file
     * @param array  $options
     */
    public function initialize($file, array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);
        $this->options = $resolver->resolve($options);
    }

    public function encode()
    {
        // Apply modifications to the file
    }

    /**
     * @param OptionsResolver $resolver
     */
    private function configureOptions(OptionsResolver $resolver)
    {
        // Defaults
        $resolver->setDefaults(array(
            'output'  => 'jpg',
            'quality' => 90,
        ));

        // Requirements
        $resolver->setRequired(array('name'));

        // Type validation
        $resolver->setAllowedTypes(array(
            'quality' => 'integer',
        ));

        // Value validation
        $resolver->setAllowedValues(array(
            'output' => array('jpg', 'png'),
        ));
    }
}
