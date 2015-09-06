<?php

namespace JP\DiceBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\DefinitionDecorator;

/**
 * Class DiceCompilerPass
 */
class DiceCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('jp.die')) {
            return;
        }

        $config = $container->getParameter('jp_dice');

        foreach ($config['dice'] as $name => $parameters) {
            $serviceDefinition = new DefinitionDecorator('jp.die');
            $serviceDefinitionName = sprintf('jp.die.%s', $name);

            $serviceDefinition->isAbstract(false);
            $serviceDefinition->addMethodCall('setFaces', array($parameters['faces']));
            if (!empty($parameters['load'])) {
                $serviceDefinition->addMethodCall('setLoad', array($parameters['load']));
            }

            $container->setDefinition($serviceDefinitionName, $serviceDefinition);
        }
    }
}