<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Telemetry;

use function memory_get_peak_usage;
use function memory_get_usage;

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final readonly class SystemMemoryMeter implements MemoryMeter
{
    public function memoryUsage(): MemoryUsage
    {
<<<<<<< HEAD
        return MemoryUsage::fromBytes(memory_get_usage(true));
=======
        return MemoryUsage::fromBytes(memory_get_usage());
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
    }

    public function peakMemoryUsage(): MemoryUsage
    {
<<<<<<< HEAD
        return MemoryUsage::fromBytes(memory_get_peak_usage(true));
=======
        return MemoryUsage::fromBytes(memory_get_peak_usage());
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
    }
}
