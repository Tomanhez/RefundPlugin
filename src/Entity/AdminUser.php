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

namespace Sylius\Plus\Entity;

use Sylius\Component\Core\Model\AdminUser as BaseAdminUser;

final class AdminUser extends BaseAdminUser implements AdminUserInterface
{
    /** @var string */
    private $lastLoginIp;

    public function getLastLoginIp(): string
    {
        return $this->lastLoginIp;
    }

    public function setLastLoginIp(string $lastLoginIp): void
    {
        $this->lastLoginIp = $lastLoginIp;
    }
}
