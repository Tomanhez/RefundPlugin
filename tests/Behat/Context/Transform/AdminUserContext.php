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

namespace Tests\Sylius\Plus\Behat\Context\Transform;

use Behat\Behat\Context\Context;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\User\Repository\UserRepositoryInterface;

final class AdminUserContext implements Context
{
    /** @var UserRepositoryInterface */
    private $adminUserRepository;

    public function __construct(UserRepositoryInterface $adminUserRepository)
    {
        $this->adminUserRepository = $adminUserRepository;
    }

    /**
     * @Transform :adminEmail
     */
    public function getAdminUser(string $administrator): AdminUserInterface
    {
        /** @var AdminUserInterface $adminUser */
        $adminUser = $this->adminUserRepository->findOneByEmail($administrator);

        return $adminUser;
    }
}
