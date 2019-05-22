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

namespace Tests\Sylius\Plus\Behat\Page\Admin\AdminUser;

use Sylius\Behat\Page\Admin\Crud\IndexPageInterface as BaseIndexPageInterface;
use Sylius\Component\Core\Model\AdminUserInterface;

interface IndexPageInterface extends BaseIndexPageInterface
{
    public function getLastLoginDateAdministrator(AdminUserInterface $adminUser): string;
}
