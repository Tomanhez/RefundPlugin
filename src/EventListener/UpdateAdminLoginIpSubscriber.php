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

namespace Sylius\Plus\EventListener;

use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Plus\Entity\AdminUserInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

final class UpdateAdminLoginIpSubscriber
{
    /** @var ObjectManager */
    private $userManager;

    public function __construct(ObjectManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function updateAdminLoginIp(InteractiveLoginEvent $interactiveLoginEvent): void
    {
        $user = $interactiveLoginEvent->getAuthenticationToken()->getUser();

        if (!$user instanceof AdminUserInterface) {
            return;
        }

        /** @var string $ip */
        $ip = $interactiveLoginEvent->getRequest()->getClientIp();

        $user->setLastLoginIp($ip);
        $this->userManager->persist($user);
        $this->userManager->flush();
    }
}
