<?php

declare(strict_types=1);

namespace Sylius\Plus\EventListener;

use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Plus\Entity\AdminUserInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

final class LastLoginAdminUserIpSubscriber
{
    /** @var ObjectManager */
    private $userManager;

    public function __construct(ObjectManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function setLastLoginAdminUserIp(InteractiveLoginEvent $interactiveLoginEvent): void
    {
        $user = $interactiveLoginEvent->getAuthenticationToken()->getUser();

        if (!$user instanceof AdminUserInterface) {
            return ;
        }
        $ip = $interactiveLoginEvent->getRequest()->getClientIp();

        $user->setLastLoginIp($ip);
        $this->userManager->persist($user);
        $this->userManager->flush();
    }
}
