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
use Sylius\Component\Core\Model\AdminUserInterface;
use Tests\Sylius\Plus\Behat\Page\Admin\IndexPageInterface;
use Webmozart\Assert\Assert;

final class AdminContext implements Context
{
    /** @var IndexPageInterface */
    private $indexPage;

    public function __construct(IndexPageInterface $indexPage)
    {
        $this->indexPage = $indexPage;
    }

    /**
     * @When I browse administrators page
     */
    public function iBrowseAdministratorsPage(): void
    {
        $this->indexPage->open();
    }

    /**
     * @Then I should see :quantity administrators
     */
    public function iShouldSeeAdministrators(int $quantity): void
    {
        Assert::same($this->indexPage->countAdministrator(), $quantity);
    }

    /**
     * @Given I should see that administrator :adminEmail has logged in :date
     */
    public function iShouldSeeThatAdministratorHasLoggedIn(AdminUserInterface $adminEmail, string $date): void
    {
        Assert::same($this->indexPage->getLastLoginDateAdministrator($adminEmail), $date);
    }
}
