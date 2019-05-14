<?php

declare(strict_types=1);

namespace Sylius\Plus\Controller;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

final class GreetingController
{
    /** @var EngineInterface */
    private $engine;

    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    public function staticallyGreetAction(?string $name): Response
    {
        return $this->engine->renderResponse(
            '@SyliusPlusPlugin/static_greeting.html.twig',
            ['greeting' => $this->getGreeting($name)]
        );
    }

    public function dynamicallyGreetAction(?string $name): Response
    {
        return $this->engine->renderResponse(
            '@SyliusPlusPlugin/dynamic_greeting.html.twig',
            ['greeting' => $this->getGreeting($name)]
        );
    }

    private function getGreeting(?string $name): string
    {
        switch ($name) {
            case null:
                return 'Hello!';
            case 'Lionel Richie':
                return 'Hello, is it me you\'re looking for?';
            default:
                return sprintf('Hello, %s!', $name);
        }
    }
}
