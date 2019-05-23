<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\Sylius\Plus\Entity;

use PhpSpec\ObjectBehavior;
use Sylius\Plus\Entity\AdminUserInterface;

final class AdminUserSpec extends ObjectBehavior
{
    function it_implements_admin_user_interface(): void
    {
        $this->shouldImplement(AdminUserInterface::class);
    }

    function it_has_last_login_ip(): void
    {
        $this->setLastLoginIp('127.0.0.0');
        $this->getLastLoginIp()->shouldReturn('127.0.0.0');
    }
}
