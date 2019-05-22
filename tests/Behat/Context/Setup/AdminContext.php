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

namespace Tests\Sylius\Plus\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\User\Repository\UserRepositoryInterface;

final class AdminContext implements Context
{
    /** @var UserRepositoryInterface */
    private $adminUserRepository;

    public function __construct(UserRepositoryInterface $adminUserRepository)
    {
        $this->adminUserRepository = $adminUserRepository;
    }

    /**
     * @Given administrator :adminEmail has logged in :date
     */
    public function administratorHasLoggedIn(AdminUserInterface $adminEmail, string $date): void
    {
        /** @var AdminUserInterface $adminFromRepo */
        $adminFromRepo = $this->adminUserRepository->find($adminEmail->getId());
        $adminFromRepo->setLastLoggedDate(new \DateTime($date));
    }
}
