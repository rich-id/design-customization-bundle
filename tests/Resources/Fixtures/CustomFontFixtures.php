<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Resources\Fixtures;

use RichCongress\RecurrentFixturesTestBundle\DataFixture\AbstractFixture;
use RichId\DesignCustomizationBundle\Domain\Entity\CustomFont;

final class CustomFontFixtures extends AbstractFixture
{
    protected function loadFixtures(): void
    {
        $this->createObject(
            CustomFont::class,
            'font-custom',
            [
                'fontFamily' => 'CustomFont',
                'url'        => 'https://test.test',
            ]
        );
    }
}
