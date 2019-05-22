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

use Behat\Mink\Element\NodeElement;
use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;
use Sylius\Component\Core\Model\AdminUserInterface;

final class IndexPage extends SymfonyPage implements IndexPageInterface
{

    public function getRouteName(): string
    {
        return 'sylius_admin_admin_user_index';
    }

    public function getLastLoginDateAdministrator(AdminUserInterface $adminUser): string
    {
        $adminMail = $adminUser->getEmail();

        /** @var NodeElement $adminRow */
        return $lastLoginDate = $this->getDocument()->find('css', sprintf('table tbody tr:contains("%s") td:nth-child(6)', $adminMail))->getText();
    }
}
