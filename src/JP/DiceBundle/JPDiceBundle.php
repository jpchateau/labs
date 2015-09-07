<?php

namespace JP\DiceBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use JP\DiceBundle\DependencyInjection\Compiler\DiceCompilerPass;

/**
 * Class JPDiceBundle.
 */
class JPDiceBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new DiceCompilerPass());
    }
}
