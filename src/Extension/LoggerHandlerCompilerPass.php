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

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Vainyl\Core\Extension\AbstractCompilerPass;

/**
 * Class LoggerHandlerCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerHandlerCompilerPass extends AbstractCompilerPass
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
            foreach ($handlers as $handlerId => $tags) {
                $loggerDefinition->addMethodCall('addHandler', [new Reference($handlerId)]);
            }
        }

        return $this;
    }
}
