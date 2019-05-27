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

namespace Tests\Sylius\Plus\Behat\Context\Transform\Admin;

use Behat\Behat\Context\Context;
use Sylius\Component\User\Repository\UserRepositoryInterface;
use Sylius\Plus\Entity\AdminUserInterface;

final class AdminUserContext implements Context
{
    /** @var UserRepositoryInterface */
    private $adminUserRepository;

    public function __construct(UserRepositoryInterface $adminUserRepository)
    {
        $this->adminUserRepository = $adminUserRepository;
    }

    /**
     * @Transform :adminUser
     */
    public function getAdminUser(string $email): AdminUserInterface
    {
        /** @var AdminUserInterface $adminUser */
        $adminUser = $this->adminUserRepository->findOneByEmail($email);

        return $adminUser;
    }
}
