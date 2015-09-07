<?php

namespace JP\DiceBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\DefinitionDecorator;

/**
 * Class DiceCompilerPass.
 */
class DiceCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('jpc.dice')) {
            return;
        }

        if (!$container->hasDefinition('jpc.dice.manager')) {
            return;
        }

        $config = $container->getParameter('jpc_dice');

        foreach ($config['dices'] as $name => $parameters) {
            $serviceDefinition = new DefinitionDecorator('jpc.dice');
            $serviceDefinitionName = sprintf('jpc.dice.%s', $name);

            $serviceDefinition->isAbstract(false);
            $serviceDefinition->addMethodCall('setFaces', array($parameters['faces']));
            if (!empty($parameters['load'])) {
                $serviceDefinition->addMethodCall('setLoad', array($parameters['load']));
            }

            $container->setDefinition($serviceDefinitionName, $serviceDefinition);

            $managerServiceDefinition = new DefinitionDecorator('jpc.dice.manager');
            $managerServiceDefinition->isAbstract(false);
            $managerServiceDefinitionName = sprintf('dice_%s', $name);
            $managerServiceDefinition->replaceArgument(0, new Reference($serviceDefinitionName));

            $container->setDefinition($managerServiceDefinitionName, $managerServiceDefinition);
        }
    }
}
