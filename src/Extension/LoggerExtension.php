<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   Logger
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types=1);

namespace Vainyl\Logger\Extension;

use Vainyl\Core\Extension\AbstractExtension;

/**
 * Class LoggerExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerExtension extends AbstractExtension
{
    /**
     * @inheritDoc
     */
    public function getCompilerPasses(): array
    {
        return [new LoggerHandlerCompilerPass()];
    }
}