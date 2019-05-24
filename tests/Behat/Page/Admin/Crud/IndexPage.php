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

namespace Tests\Sylius\Plus\Behat\Page\Admin\Crud;

use Sylius\Behat\Page\Admin\Crud\IndexPage as BaseIndexPage;

final class IndexPage extends BaseIndexPage implements IndexPageInterface
{
    public function getLastLoginIpOnPage(string $administrator): string
    {
        $element = $this->getDocument()->find('css', sprintf('tr:contains("%s") td:nth-child(7)', $administrator));

        if (null === $element) {
            return '';
        }

        return $element->getText();
    }

    public function getLastLoginDateOnPage(string $adminUser): string
    {
        $element = $this->getDocument()->find('css', sprintf('tr:contains("%s") td:nth-child(6)', $adminUser));

        if (null === $element) {
            return '';
        }

        return $element->getText();
    }
}
