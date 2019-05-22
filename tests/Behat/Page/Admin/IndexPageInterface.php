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

namespace Tests\Sylius\Plus\Behat\Page\Admin;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPageInterface;
use Sylius\Component\Core\Model\AdminUserInterface;

interface IndexPageInterface extends SymfonyPageInterface
{
    public function getLastLoginDateAdministrator(AdminUserInterface $adminUser): string;
}
