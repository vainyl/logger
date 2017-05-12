<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-logger
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-logger
 */
declare(strict_types = 1);

namespace Vainyl\Logger\Extension;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class LoggerHandlerCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerHandlerCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        $loggers = $container->findTaggedServiceIds('logger');
        $handlers = $container->findTaggedServiceIds('logger.handler');
        foreach ($loggers as $definitionId => $description) {
            $loggerDefinition = $container->findDefinition($definitionId);
            if ($loggerDefinition->isAbstract()) {
                continue;
            }
            foreach ($handlers as $handlerId => $tags) {
                $handlerDefinition = $container->findDefinition($handlerId);
                if ($handlerDefinition->isAbstract()) {
                    continue;
                }
                $loggerDefinition->addMethodCall('addHandler', [new Reference($handlerId)]);
            }
        }

        return $this;
    }
}
