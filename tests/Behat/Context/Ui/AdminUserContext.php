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

namespace Tests\Sylius\Plus\Behat\Context\Ui;

use Behat\Behat\Context\Context;
use Tests\Sylius\Plus\Behat\Page\Admin\Crud\IndexPageInterface;
use Webmozart\Assert\Assert;

final class AdminUserContext implements Context
{
    /** @var IndexPageInterface */
    private $indexPage;

    public function __construct(IndexPageInterface $indexPage)
    {
        $this->indexPage = $indexPage;
    }

    /**
     * @Then I should see that the administrator :administrator has recently logged in using :lastLoginIp address
     */
    public function iShouldSeeThatTheAdministratorHasRecentlyLoggedInUsingAddress(string $administrator, string $lastLoginIp): void
    {
        Assert::same($this->indexPage->getLastLoginIpOnPage($administrator), $lastLoginIp);
    }

    /**
     * @Then I should see that administrator :adminUser has logged in :date
     */
    public function iShouldSeeThatAdministratorHasLoggedIn(string $adminUser, string $date): void
    {
        Assert::same($this->indexPage->getLastLoginDateOnPage($adminUser), $date);
    }
}
