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

namespace Vainyl\Logger;

use Psr\Log\LoggerInterface;

/**
 * Interface LoggerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DynamicLoggerInterface extends LoggerInterface
{
    /**
     * @inheritDoc
     */
    public function overrideLevel($level) : DynamicLoggerInterface;

    /**
     * @inheritDoc
     */
    public function restoreLevel() : DynamicLoggerInterface;
}