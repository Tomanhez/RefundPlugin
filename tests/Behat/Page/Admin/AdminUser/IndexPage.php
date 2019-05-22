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

use Behat\Mink\Element\NodeElement;
use Sylius\Behat\Page\Admin\Crud\IndexPage as baseIndexPage;
use Sylius\Component\Core\Model\AdminUserInterface;
use Webmozart\Assert\Assert;

final class IndexPage extends BaseIndexPage implements IndexPageInterface
{
    public function getRouteName(): string
    {
        return 'sylius_admin_admin_user_index';
    }

    public function getLastLoginDateAdministrator(AdminUserInterface $adminUser): string
    {
        /** @var string $adminMail */
        $adminMail = $adminUser->getEmail();

        /** @var NodeElement $lastLoginDate */
        $lastLoginDate = $this->getDocument()->find('css', sprintf('table tbody tr:contains("%s") td:nth-child(6)', $adminMail));

        Assert::notNull($lastLoginDate);

        return $lastLoginDate->getText();
    }
}
