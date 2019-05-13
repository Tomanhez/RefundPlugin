<?php

declare(strict_types=1);

namespace Sylius\Plus;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class SyliusPlusPlugin extends Bundle
{
    use SyliusPluginTrait;
}
