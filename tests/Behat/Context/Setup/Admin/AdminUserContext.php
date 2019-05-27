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

namespace Tests\Sylius\Plus\Behat\Context\Setup\Admin;

use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\User\Repository\UserRepositoryInterface;
use Sylius\Plus\Entity\AdminUserInterface;

final class AdminUserContext implements Context
{
    /** @var FactoryInterface */
    private $userFactory;

    /** @var UserRepositoryInterface */
    private $userRepository;

    /** @var ObjectManager */
    private $objectManager;

    public function __construct(
        FactoryInterface $userFactory,
        UserRepositoryInterface $userRepository,
        ObjectManager $objectManager
    ) {
        $this->userFactory = $userFactory;
        $this->userRepository = $userRepository;
        $this->objectManager = $objectManager;
    }

    /**
     * @Given administrator :adminUser has logged in :date
     */
    public function administratorHasLoggedIn(AdminUserInterface $adminUser, string $date): void
    {
        $adminUser->setLastLogin(new \DateTime($date));

        $this->objectManager->persist($adminUser);
        $this->objectManager->flush();
    }

    /**
     * @Given there is an administrator :email that recently logged in using :lastLoginIp IP address
     * @Given there is also an administrator :email that recently logged in using :lastLoginIp IP address
     */
    public function thereIsAnAdministratorThatRecentlyLoggedInUsingIPAddress(string $email, string $lastLoginIp): void
    {
        $adminUser = $this->createAdmin($email);
        $adminUser->setLastLoginIp($lastLoginIp);

        $this->userRepository->add($adminUser);
    }

    private function createAdmin(string $email): AdminUserInterface
    {
        /** @var AdminUserInterface $adminUser */
        $adminUser = $this->userFactory->createNew();
        $adminUser->setLocaleCode('en_US');
        $adminUser->setEmail($email);
        $adminUser->setPassword('password');

        return $adminUser;
    }
}
