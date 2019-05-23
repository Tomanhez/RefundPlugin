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
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\User\Repository\UserRepositoryInterface;

final class AdminUserContext implements Context
{
    /** @var FactoryInterface */
    private $userFactory;

    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(
        FactoryInterface $userFactory,
        UserRepositoryInterface $userRepository
    ) {
        $this->userFactory = $userFactory;
        $this->userRepository = $userRepository;
    }

    /**
     * @Given there is an administrator :email with :lastLoginIp address
     * @Given there is also an administrator :email with :lastLoginIp address
     */
    public function thereIsAlsoAnAdministratorWithAddress(string $email, string $lastLoginIp): void
    {
        /** @var AdminUserInterface $adminUser */
        $adminUser = $this->userFactory->createNew();
        $adminUser->setEmail($email);
        $adminUser->setPassword('password');
        $adminUser->setLastLoginIp($lastLoginIp);

        $this->userRepository->add($adminUser);
    }
}
