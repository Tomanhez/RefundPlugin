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

namespace Tests\Sylius\Plus\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Tests\Sylius\Plus\Behat\Page\Admin\Crud\IndexPageInterface;
use Webmozart\Assert\Assert;

final class ManagingAdministratorsContext implements Context
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
        $this->indexPage->open();

        Assert::same($this->indexPage->getLastLoginIpOnPage($administrator), $lastLoginIp);
    }
}
